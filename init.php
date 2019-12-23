<?php

require_once "config-global.php";
require_once "vendor/autoload.php";

Autoload::register();

$System = new Core\System;

$System->start();
