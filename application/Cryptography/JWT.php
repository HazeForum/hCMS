<?php


namespace Cryptography;


class JWT
{

    public static function generate(array $payload)
    {

        $headers = [

            'created'   =>  time(),
            'expires'   =>  '',

        ];
    }

}