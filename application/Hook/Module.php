<?php


namespace Hook;



use Core\Path;
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

        $this->Modules = json_decode($JSON, true);

        if (empty($this->Modules))
        {
            echo json_encode([
                "message"   => "Can't load modules file",
                "code"      => "MO001"
            ]);

            exit;
        }

        $this->use_default();

    }

    private function use_default()
    {

        $default = CONFIG_GLOBAL['Modules']['default_module'];

        if ( !isset($this->Modules[$default]) )
            return false;

        $Module = $this->Modules[$default];

        $this->FileGet->get_module($default);

    }

}