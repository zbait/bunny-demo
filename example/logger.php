<?php
// template use autoload
require_once __DIR__.'/../vendor/autoload.php';

// example logic

use Bunny\Log\Logger as Logger;

$log = new Logger('test');
$log->info('test', array('info' => 'data'));
$debugLog = new Logger('debug');
$debugLog->debug('debug', array('info' => 'data'));