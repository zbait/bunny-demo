<?php

require_once __DIR__.'/../vendor/autoload.php';

use Bunny\Config\Config;
use Bunny\Provider\Swoole\WebSocketServer;


//error_reporting(0); //关闭警告信息
//error_reporting(E_ERROR|E_PARSE);
error_reporting(E_ALL);

//全局参数配置
Config::setGlobal(Config::PATH_ROOT, __DIR__.'/../');
Config::setGlobal(Config::ENV, 'slave');

//启动WebSocketServer
$server = new WebSocketServer();
$server->run();