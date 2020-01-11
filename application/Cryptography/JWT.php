<?php


namespace Cryptography;


class JWT
{

    const valid_time = '24 hour';

    public static function generate(array $payload) : string
    {

        $Encrypt = new Encrypt();

        $headers = [

            'created'   =>  $Encrypt->aes( time() ),
            'expires'   =>  $Encrypt->aes( strtotime('+' . self::valid_time) ),

        ];

        $real_payload = [];

        foreach ($payload as $key => $value)
        {

            $real_payload[] = $Encrypt->aes($key) . '#!#' . $Encrypt->aes($value);

        }

        $Token = implode('.', $headers);

        $Token .= '.' . implode('.', $real_payload);

        return $Token;
    }

    public static function token_is_valid(string $token) : bool
    {
        $dataToken = self::get_token_data($token);

        if (!$dataToken)
            return false;

        if ($dataToken['headers']['expires'] < time())
            return false;

        if ($dataToken['headers']['created'] > $dataToken['headers']['expires'])
            return false;

        if (count($dataToken['payloads']) < 1)
            return false;

        return true;

    }

    public static function get_token_data(string $token)
    {

        $exploded = explode('.', $token);

        if (count($exploded) < 1)
            return false;


        $Decrypt = new Decrypt();

        $Data = [

            'headers'   => [
                'created'   => $Decrypt->aes($exploded[0]),
                'expires'   => $Decrypt->aes($exploded[1])
            ]

        ];

       $payloads_names = [];

       for ($i = count($exploded) - 1; $i > 1; $i--)
       {

           $payloads_names[] = explode('#!#', $exploded[$i]);

       }

       $payloads = [];

       for ($i = count($payloads_names) - 1; $i >= 0; $i--)
       {

           $aux = $payloads_names[$i];

           $name = $Decrypt->aes( $aux[0] );

           $value = $Decrypt->aes( $aux[1] );

           if (!$name || !$value)
               return false;

           $payloads[$name] = $value;

       }

       $Data['payloads'] = $payloads;

       return $Data;

    }

}