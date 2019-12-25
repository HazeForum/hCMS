<?php

define('CONFIG_GLOBAL', [

    "Url"  => [
        'base'      => "localhost/hCMS",
        'https'     => false,
    ],

    "Database" => [
        'host'      =>  '127.0.0.1',
        'username'  =>  'root',
        'password'  =>  '',
        'dbname'    =>  'hcms',

        'port'      =>  3306
    ],

    "Modules" => [
        'default_module'    => 'api'
    ],

    "Core" => [
        'base_dir'  =>  dirname(__FILE__),
        'app_path'  =>  'application'
    ]

]);