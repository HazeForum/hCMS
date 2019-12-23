<?php

define('CONFIG_GLOBAL', [

    "Url"  => [
        "base"      => "localhost/hCMS",
        "https"     => false,
    ],

    "Modules" => [
        "default_module"    => 'api'
    ],

    "Core" => [
        "base_dir"  =>  dirname(__FILE__),
        "app_path"  =>  "application"
    ]

]);