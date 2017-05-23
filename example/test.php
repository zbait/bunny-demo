<?php

// template use autoload
require_once __DIR__.'/../vendor/autoload.php';

// example logic
$reads = array(
    '1' => '127.0.0.1',
    '2' => '127.0.0.1',
    '3' => '127.0.0.1',
);
var_dump($reads[1]);