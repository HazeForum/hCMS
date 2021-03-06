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
    ],

    ## Don't change that if you don't know what doing

    "Cryptography"  => [

        'key'   =>  'eShVmYq3t6w9z$C&F)J@NcQfTjWnZr4u7x!A%D*G-KaPdSgUkXp2s5v8y/B?E(H+MbQeThWmYq3t6w9z$C&F)J@NcRfUjXn2r5u7x!A%D*G-KaPdSgVkYp3s6v9y/B?E(H+MbQeThWmZq4t7w!z%C&F)J@NcRfUjXn2r5u8x/A?D(G-KaPdSgVkYp3s6v9y$B&E)H@MbQeThWmZq4t7w!z%C*F-JaNdRfUjXn2r5u8x/A?D(G+KbPeShVkYp3s6v9y$B&E)H@McQfTjWnZq4t7w!z%C*F-JaNdRgUkXp2s5u8x/A?D(G+KbPeShVmYq3t6w9y$B&E)H@McQfTjWnZr4u7x!A%C*F-JaNdRgUkXp2s5v8y/B?E(G+KbPeShVmYq3t6w9z$C&F)J@McQfTjWnZr4u7x!A%D*G-KaPdRgUkXp2s5v8y/B?E(H+MbQeThVmYq3t6w9z$C&F)J@NcRfUjXnZr4u7x!A%D*G-KaPdSgVkYp3s5v8y/B?E(H+Mb',
        '2key'  =>  'dZezK5S,3dg7%.n;5M$TdRYv7X6%XsGSYxf p%*%MHvNQtPQe)m>6mkmq-7%EBvW'

    ]

]);