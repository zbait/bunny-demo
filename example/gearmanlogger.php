<?php

include(__DIR__."/../src/Bunny/Log/Provider/GearmanLogger.php");

use Bunny\Log\Provider\GearmanLogger as GearmanLogger;

FileLogger::record('test', 'title', array('data' => 'example'), __DIR__, 'fileLog');