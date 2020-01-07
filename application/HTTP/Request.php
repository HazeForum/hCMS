<?php


namespace HTTP;


class Request
{

    public static function is_obtained(string $name, string $method = 'GET') : bool
    {

        if (strtoupper($method) == 'POST')
            $req = $_POST;
        else
            $req = $_GET;


        if (isset( $req[$name] ) )
            return true;


        return false;

    }
    
}