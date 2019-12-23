<?php


namespace Core;


use HTTP;
use Hook;

class System
{

    public $baseUrl;
    private $Modules;

    public function __construct()
    {
        $this->baseUrl = HTTP\Helper::get_base_url();

        $this->set_constants();

        $this->Modules = new Hook\Module();
    }

    public function start()
    {



    }

    private function set_constants() : void
    {

        if (!defined('baseUrl'))
            define('baseUrl', $this->baseUrl);

    }

}