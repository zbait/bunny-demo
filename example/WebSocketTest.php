<?php

namespace Simple\Tests;

require_once __DIR__.'/../vendor/autoload.php';

use Bunny\Provider\Swoole\Client;

function run(){
	$host = '127.0.0.1';
	$port = '9501';
	$client = new Client($host, $port);
	if (!$client->connect()) {
		echo "error\r\n";
		return;
	}
	$sendResult = $client->send('ping');
	var_dump($sendResult);
    $result =  $client->recv();
	var_dump($result);
}

run();

