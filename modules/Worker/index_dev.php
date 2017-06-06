<?php

if (substr(php_sapi_name(), 0, 3) !== 'cli') {
	die("Please used in client mode");
}

require_once __DIR__.'/../../vendor/autoload.php';

use Bunny\Config\Config;
use Bunny\Provider\Gearman\WorkerServer;

error_reporting(E_ALL);

//全局参数配置
Config::setGlobal(Config::PATH_ROOT, __DIR__.'/../../');
Config::setGlobal(Config::ENV, 'dev');

$server = new WorkerServer();
$server->run();