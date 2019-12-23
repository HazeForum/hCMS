<?php


namespace Hook;



use File;
use JsonException;

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

        $this->Modules = json_decode($JSON, true);

        if (empty($this->Modules))
        {
            echo json_encode([
                "message"   => "Can't load modules file",
                "code"      => "MO001"
            ]);

            exit;
        }

    }

}