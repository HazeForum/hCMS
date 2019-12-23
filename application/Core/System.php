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

        if ( HTTP\Request::is_obtained('m', 'GET') )
        {
            $Module = filter_var($_GET['m'], FILTER_SANITIZE_STRING);

            $this->Hook->get($Module);
        }
        else
        {
            $this->Hook->use_default();
        }

    }

    private function set_constants() : void
    {

        if (!defined('baseUrl'))
            define('baseUrl', $this->baseUrl);

    }

}