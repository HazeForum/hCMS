<?php


namespace Cryptography;



class Encrypt
{

    private const DATA = CONFIG_GLOBAL['Cryptography'];

    public $text;

    private $method = 'aes-256-cbc';

    public function aes()
    {

        $iv_length = openssl_cipher_iv_length($this->method);
        $iv = openssl_random_pseudo_bytes($iv_length);

        $first_encrypted = openssl_encrypt($this->text, $this->method, self::DATA['key'], OPENSSL_RAW_DATA ,$iv);
        $second_encrypted = hash_hmac('sha3-512', $first_encrypted, self::DATA['2key'], TRUE);

        return base64_encode($iv.$second_encrypted.$first_encrypted);

    }

}