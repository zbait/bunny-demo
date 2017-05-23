<?php

include(__DIR__."/../src/Bunny/Log/Provider/FileLogger.php");

use Bunny\Log\Provider\FileLogger as FileLogger;

FileLogger::record('test', 'title', array('data' => 'example'), __DIR__, 'fileLog');