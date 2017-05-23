<?php

namespace Example;
// autoload
require_once __DIR__.'/../vendor/autoload.php';


class Example{

    private $examples = array(
        'config.php',
        'config',
        'logger'
    );
    public function run(){
        for ($i=0; $i<count($this->examples); $i++) {
            echo '['.$i.'] - '.$this->examples[$i].' - '.$this->examples[$i].PHP_EOL;
        }
        //选择需要执行的函数
        fwrite(STDOUT, "Select your Example Number: ".PHP_EOL); 

        // 获取选择参数
        $number = (int)trim(fgets(STDIN));

        // 打印提示信息
        fwrite(STDOUT, $this->examples[$number]." will be run ...".PHP_EOL);

        require_once(__DIR__.'/'.$this->examples[$number]);
    }
}
$example = new Example();
$example->run();