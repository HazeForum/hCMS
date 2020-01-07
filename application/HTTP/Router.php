<?php


namespace HTTP;


use Hook\Module;

class Router
{

    public static function current_route() : array
    {

        if ( Request::is_obtained('m', 'GET') )
        {

            $route = self::sanitize($_GET['m']);

            $route = self::generate($route);

            return ["Module" => $route[0], "Item" => $route[1]];

        }
        else
        {
            return ["Module" => CONFIG_GLOBAL['Modules']['default_module'], "Item" => 'index'];
        }

    }

    private static function generate(string $route) : array
    {

        $dirs = explode('/', $route);

        $Hook = new Module();

        $Modules = $Hook->getModules();

        if (count($dirs) == 1)
        {
            ## Se for um módulo, ele inicia a index do modulo.

            if ( isset( $Modules[ $dirs[0] ] ) )
                return [$dirs[0], 'index'];


            ## Se for um endpoint em subdiretorio e sem arquivo especifico, acessa a index do arquivo.

            return [ CONFIG_GLOBAL['Modules']['default_module'], $dirs[0] . '/index' ];

        }



        $Item = '';

        $items_count = count($dirs) - 1;

        $Endpoint = $dirs[0];

        for ($i = 1; $i < $items_count; $i++):

            $Item .= $dirs[$i] . ( $i == $items_count ? '' : '/');

        endfor;

        $Item .= $dirs[ $items_count ];


        ## Se o endpoint não for modulo, ele vai para o default

        if ( !isset($Modules[$Endpoint]) )
        {
            $Item = $Endpoint . DS . $Item;
            $Endpoint = CONFIG_GLOBAL['Modules']['default_module'];
        }



        return [ $Endpoint, $Item ];

    }

    private static function sanitize(string $route) : string
    {
        return filter_var($route, FILTER_SANITIZE_STRING);
    }

}