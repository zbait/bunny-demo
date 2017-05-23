<?php

namespace Example\Controller;

use Bunny\Http\Request;
use Bunny\Http\Response;
use Bunny\Http\Mvc\Controller;
use Bunny\Client\HttpClient;
use Bunny\Client\RedisClient;

use Bunny\Config\Config;

class HttpController extends Controller{


    public function indexAction(){
        $this->response->addData('title', 'Welcome to Bunny!');
    }

    public function selectAction(){
        $pdo = new PDO();
    }

    // ========== API ==========

    /**
     * 如何使用API类型的msg方法
     */
    public function msgAction(){
        $this->response->msg(200,Config::getGlobal(Config::ENV));
        //$this->msg(200,'I am msg action');
        $this->info('msg action','info log');
        $this->debug('mgs action','debug log');
    }

    /**
     * 如何使用API类型
     */
    public function apiAction(){
        $this->response->api()->addData('ddd','dd');
    }

    public function curlAction(){
        $rtn = HttpClient::get('http://www.baidu.com', 1);
        $this->response->api()->addData('baidu',$rtn);
    }

    public function redisAction(){
        $redis = RedisClient::init();
        $key = 'bunny.test.redis.key';
        if($redis->get($key)){
            $redis->set($key,'正');
        }else{
            $redis->set($key,'反');
        }
        $redis->expireAt($key, time()+1);
        $data = $redis->get($key);
        $redis->close();
        $this->msg(200, $data);
    }
}