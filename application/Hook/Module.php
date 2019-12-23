<?php


namespace Hook;



use File;

class Module
{

    private $Modules;
    private $FileGet;

    public function __construct()
    {

        $this->FileGet = new File\Get();

        $this->init();

    }

    public function get(string $Module)
    {

    }


    private function init()
    {
        $this->FileGet->directory('vendor');

        $JSON = $this->FileGet->_get('modules.json');

        var_dump($JSON);

    }

}