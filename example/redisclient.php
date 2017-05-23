<?php

// template use autoload
require_once __DIR__.'/../vendor/autoload.php';

// example logic

use Bunny\Client\RedisClient;

$client = RedisClient::init(array('host' => '127.0.0.1', 'port' => 6379));

var_dump($client->ping());
