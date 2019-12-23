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

            //var_dump($route);

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

        if (count($dirs) == 1)
        {

            $Hook = new Module();

            $Modules = $Hook->getModules();

            ## Se for um módulo, ele inicia a index do modulo.

            if ( isset( $Modules[ $dirs[0] ] ) )
                return [$dirs[0], 'index'];

            return [ CONFIG_GLOBAL['Modules']['default_module'], $dirs[0] ];

        }



        $Item = $dirs[ count($dirs) -1 ]; # Item do endpoint

        $Endpoint = '';

        # -2 pois o último é o item

        $endpoint_count = count($dirs) - 2;

        for ($i = 0; $i <= $endpoint_count; $i++):

            $Endpoint .= $dirs[$i] . ( $i == $endpoint_count ? '' : '/');

        endfor;


        return [ $Endpoint, $Item ];

    }

    private static function sanitize(string $route) : string
    {
        return filter_var($route, FILTER_SANITIZE_STRING);
    }

}