<?php

namespace File;

use Core\Path;

class Get {

    // TODO adicionar string type quando mudar xampp
    private $directory;

    public function __construct() {}

    public function directory(string $dir)
    {
        switch ($dir)
        {
            case 'assets':
                $this->directory = Path::get_real_path('{base}/src/assets/');
                break;

            case 'src':
                $this->directory = Path::get_real_path('{base}/src/');
                break;

            default:
                $this->directory = Path::get_real_path('{base}/' . $dir . '/');
        }
    }

    public function _get(string $item)
    {

        if (empty($this->directory)) return false;

        $fulldir = Path::get_real_path($this->directory . $item);

        if (!file_exists($fulldir))
            return false;

        return file_get_contents($fulldir);

    }

   public function get_module(string $name, string $item = 'index')
    {
        $path = Path::get_real_path('{base}/src/modules/' . $name . '/' . $item . '.php');

        if (file_exists($path))
            include_once $path;

        else return false;

    }

    public function get_asset(string $name, string $type, bool $URL = true)
    {

        $this->directory('assets');

        $fulldir = $this->directory;

        switch ($type):

            case 'js':
                $fulldir .= 'js/';
                break;
            case 'css':
                $fulldir .= 'styles/css/';
                break;

            case 'img':
                $fulldir .= 'images/';

        endswitch;

        $fulldir = Path::get_real_path($fulldir);


        ## Se for imagem, não vai pegar extensões.
        ## Caso contrario, concatena um ponto com o $type

        $extension = $type == 'img' ?  '' : '.' . $type;

        $fulldir .= $name . $extension;

        if ( file_exists($fulldir) )
        {

            if ($URL)
            {

                if ($type == 'css')
                    return "<link rel=\"stylesheet\" href=\" ";

            }

        }

        return false;


    }

}