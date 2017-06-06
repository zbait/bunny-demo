<?php

// template use autoload
require_once __DIR__.'/../../vendor/autoload.php';

// example logic

echo "11";

use Bunny\Container\Container;

$sc = new Container();

$sc->set('abc', $sc);
$sc->set('bde',$sc);

$service = $sc->get('abc');
//var_dump($service);

//var_dump($sc->getServiceIds());


$sc->register('log',array('Bunny\\Log\\Provider\\EchoLogger'));

$log = $sc->get('log');

var_dump($log);