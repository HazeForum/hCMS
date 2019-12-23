<?php


namespace Hook;



use Core\Path;
use File;

class Module
{

    private $Modules;
    private $FileGet;
    public $e;

    public function __construct()
    {

        $this->FileGet = new File\Get();

        $this->init();

    }

    public function get(string $Module) : bool
    {
        if ( !isset($this->Modules[$Module]) )
        {
            $this->FileGet->get_module('404');

            return false;
        }

        $this->FileGet->get_module($Module);

        return true;
    }

    /**
     * @return mixed
     */
    public function getModules()
    {
        return $this->Modules;
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

    public function use_default() : bool
    {

        $default = CONFIG_GLOBAL['Modules']['default_module'];

        if ( !isset($this->Modules[$default]) )
            $this->e[] = 'Cant find default module';

        $Module = $this->Modules[$default];

        $this->FileGet->get_module($default);

        return true;

    }

}