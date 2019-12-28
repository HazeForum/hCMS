<?php


namespace Api;


class Data
{

    private const valid_methods = ['GET', 'POST'];

    private $method = 'GET';
    private $data;
    private $error;

    public function set_method(string $method)
    {
        $method = strtoupper($method);

        if (in_array($method, self::valid_methods))
            $this->method = $method;
        else
            $this->error = ["Invalid Method : $method"];

    }

    public function require_values(array $values)
    {
        $this->data[] = $values;
    }

    public function get_method() : array
    {
        if ($this->method == 'POST')
            return $_POST;

        return $_GET;
    }

    public function all_values_is_obtained()
    {
        $method = $this->get_method();
        foreach ($this->data as $item)
        {
            if (!isset($method[$item]))
                return false;
        }

        return true;

    }




}