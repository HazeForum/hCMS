<?php


namespace Api;

use Cryptography\JWT;
use HTTP\Request;

class Authorization extends Data
{

    public $tokenData;

    public function require_auth()
    {
        $token = Request::get_header('authorization');

        if (!JWT::token_is_valid($token))
            self::response_error('Empty authorization');
        else
            $this->tokenData = JWT::get_token_data($token);

    }

    public static function response_error(string $message, int $code = 403)
    {

        echo json_encode([
            "message"   => $message,
            "success"   => false,
            "status"    => $code
        ]);

        exit;

    }

}