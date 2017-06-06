<?php

namespace Worker\Service;

use Bunny\Log\Provider\FileLogger;
use Bunny\Config\Config;
use Elasticsearch\ClientBuilder;

class Logger{

    private $client;

    public function asyncLog($job){
        $msg = $job->workload();
        $msg_json = json_decode($msg, true);
        $level = $msg_json['level'];
        $title = $msg_json['title'];
        $info = $msg_json['info'];
        $project_name = $msg_json['project_name'];
        $env = $msg_json['env'];
        $fileDir = Config::getGlobal(Config::PATH_ROOT).'var/logs/'.$project_name.'/'.$env.'/';
        $fileName = $msg_json['fileName'];
        FileLogger::record($level, $title, $info, $fileDir, $fileName);
    }


    public function asyncTime($job){
        date_default_timezone_set('UTC');
        $server_es = empty($this->getConfigValue('server_es')) ? '127.0.0.1:9200' : $this->getConfigValue('server_es');
        $hosts = [
            $server_es,
        ];
        $this->client = ClientBuilder::create()
                      ->setRetries(0)
                      ->setHosts($hosts)
                      ->build();
        $msg = $job->workload();
        $msg_json = json_decode($msg, true);

        $params['body'][] = [
            'index' => [
                '_index' => 'plume-'.$msg_json['project'],
                '_type' => 'plog',
            ]
        ];
        $params['body'][] = [
            'ip_remote' => $msg_json['ip_remote'],
            'ip_local' => $msg_json['ip_local'],
            'project' => $msg_json['project'],
            'url' => $msg_json['url'],
            'time_used' => $msg_json['time_used'],
            'time_create' => getUTCTime(),
            'context' => $msg_json['context'],
            'note' => $msg_json['note'],
            'env' => $msg_json['env'],
        ];
        $responses = $this->client->bulk($params);
    }

    private function getUTCTime(){
        return date('Y-m-d\TH:i:s\Z');
    }
}
