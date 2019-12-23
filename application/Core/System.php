<?php


namespace Core;


use HTTP;
use Hook;

class System
{

    public $baseUrl;
    private $Hook;

    public function __construct()
    {
        $this->baseUrl = HTTP\Helper::get_base_url();

        $this->set_constants();

        $this->Hook = new Hook\Module();
    }

    public function start()
    {
        
        $curRoute = HTTP\Router::current_route();

        $this->Hook->get($curRoute['Module'], $curRoute['Item']);

    }

    private function set_constants() : void
    {

        if (!defined('baseUrl'))
            define('baseUrl', $this->baseUrl);

    }

}