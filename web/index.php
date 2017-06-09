<?php

if (php_sapi_name() === 'cli-server' && is_file(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))){
    return false;
}

//error_reporting(E_ALL);
date_default_timezone_set('Asia/Shanghai');
ini_set('date.timezone','Asia/Shanghai');

require_once __DIR__.'/../vendor/autoload.php';

use Bunny\Http\Request;
use Bunny\Http\Response;
use Bunny\Http\Resolver;
use Bunny\Http\Render;
use Bunny\Http\Server;
use Bunny\Config\Config;

//全局参数配置
Config::setGlobal(Config::PATH_ROOT, __DIR__.'/../');
Config::setGlobal(Config::ENV, 'dev');

//HTTP请求和响应
$request = new Request();
$response = new Response();
//$response->setHeader("Access-Control-Allow-Origin: *");
//路由解析器
$resolver = new Resolver(Config::getConfig('router', false));
//渲染器 ''|'html'|'twig' 默认为html
$render = new Render(Config::getGlobal(Config::PATH_ROOT));
//启动服务
$server = new Server($request, $response, $resolver, $render);
$server->run();
