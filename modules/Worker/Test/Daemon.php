<?php

namespace Worker\Test;

use Bunny\Log\LoggerTrait;

/**
 * 守护进程示例
 */
class Daemon{

    use LoggerTrait;

    public function loop(){
        while(true){
            sleep(5);
            echo PHP_EOL."WorkerTestDaemon->loop()";
            $this->debug('WorkerTestDaemon', 'invoke loop');
        }
    }
}