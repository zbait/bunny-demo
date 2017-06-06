<?php

namespace Worker\Test;

/**
 * Gearman Worker示例
 */
class Worker{

    public function ping($job){
        $param = $job->workload();
        echo $param;
        return 'pong=>'.$param;
    }
}