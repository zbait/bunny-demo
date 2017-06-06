<?php

return array(
	'server' => array(
        // '127.0.0.1' => 4730,
        'localhost' => 4730
	),
    //数据库配置信息
	'db' => array(
        'driver' => 'mysql',
        'host' => 'localhost',
        'username'=>'root',
        'password'=>'',
        'database'=>'plume',
        'port' => '3306',
        'charset'=>'utf8'
	),
    'redis' => array(
        'host' => '127.0.0.1',
        'port' => '6379'
    ),
    'redis_slave' => array(
        'host' => '127.0.0.1',
        'port' => '6379'
    ),
	'workers' => array(
        'Worker::Test::Daemon' => array(
            'className' => 'Worker\\Test\\Daemon',
            'methodName' => 'loop',
            'num' => 1,
            'daemon' => true
        ),
        'Worker::Test::Worker' => array(
            'className' => 'Worker\\Test\\Worker',
            'methodName' => 'ping',
            'num' => 2,
            'daemon' => false
        ),
        'Bunny::Log::asyncLog' => array(
            'className' => 'Worker\\Service\\Logger',
            'methodName' => 'asyncLog',
            'num' => 1,
            'daemon' => false
        ),
        'Bunny::Log::asyncTime' => array(
            'className' => 'Worker\\Service\\Logger',
            'methodName' => 'asyncTime',
            'num' => 1,
            'daemon' => false
        ),
    ),
    'server_es' => '127.0.0.1:9200',
);