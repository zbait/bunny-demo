<?php

return array(
    'clusterNotify' => array(
        'className' => 'Bunny\\Provider\\Swoole\\Cluster',
        'methodName' => 'notify'),
    'index' => array(
        'className' => 'ChatRoom\\Index',
        'methodName' => 'index'),
    'msg' => array(
        'className' => 'ChatRoom\\Index',
        'methodName' => 'msg')
);