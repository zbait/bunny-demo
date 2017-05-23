<?php

return array(
    'PdoDao' => array(
        'driver' => 'mysql',
        'host' => 'localhost',
        'dbName' => 'bunny',
        'port' => '3306',
        'user' => 'root',
        'password' => ''
    ),
    'MysqliDao' => array(
        'driver' => 'mysql',
        'host' => 'localhost',
        'dbName' => 'bunny',
        'port' => '3306',
        'user' => 'root',
        'password' => ''
    ),
    'LaravelDao' => array(
        'reads' => array(
            '1' => '127.0.0.1',
            '2' => '127.0.0.1',
            '3' => '127.0.0.1',
        ),
        'write' => array(
            'host' => '127.0.0.1'
        ),
        'driver'    => 'mysql',
        'database'  => 'bunny',
        'username'  => 'root',
        'password'  => '',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ),
);