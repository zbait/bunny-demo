<?php

/**
 * 日志配置文件
 */

return array(
    'projectName' => 'bunny',
    'debug' => true,
    'driver' => 'file', // file|gearman
    'file' => array(
        'rootPath' => __DIR__.'/../var/logs',
    ),
    'gearman' => array(
        'workerName' => 'Service::Log::asyncLog',
        'servers' => array(
            '127.0..0.1' => 4730,
            'localhost' => 4730
        )
    )
);