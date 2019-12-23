<?php

define('CONFIG_GLOBAL', [

    "Url"  => [
        "base"      => "localhost/haze-filmes-v1",
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