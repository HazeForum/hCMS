<?php


namespace HTTP;


class Request
{

    public static function is_obtained(string $name, string $method = 'GET') : bool
    {

        if (strtoupper($method) == 'GET')
            $req = $_GET;
        else
            $req = $_POST;


        if (isset( $req[$name] ) )
            return true;


        return false;

    }
    
}