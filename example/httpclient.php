<?php

// template use autoload
require_once __DIR__.'/../vendor/autoload.php';

// example logic
use Bunny\Client\HttpClient;

$data = HttpClient::get('http://www.baidu.com');
var_dump($data);