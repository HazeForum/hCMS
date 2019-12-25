<?php

require 'init.php';

$Select = new \Database\Select();

$Select->table = 'users';
$Select->where = 'id = :id';

$Select->setAttribute(':id', 1);

var_dump($Select->get());