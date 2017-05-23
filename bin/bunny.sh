#!/bin/bash
# check your parameter number
if [ $# -lt 1 ]
then
		echo 'Please check your parameter like sh bin/bunny.sh [stop|http|ws|swagger|swagger-edit]'
		exit
fi
# init
php_cmd="php "

# start http server
if [ "$1"  = "http" ]
then
    nohup $php_cmd -S 0.0.0.0:8081 -t web/ web/index.php &>var/logs/http.log&
    echo http server start on 0.0.0.0:8081 with web/index.php
    exit
fi
# start ws server
if [ "$1"  = "ws" ]
then
    nohup $php_cmd ws/index.php &>var/logs/ws.log&
    echo websocket server start with ws/index.php
    exit
fi
# start swagger server
if [ "$1"  = "swagger" ]
then
    nohup $php_cmd -S 0.0.0.0:8090 -t swagger/ &>var/logs/swagger.log&
    echo swagger server start on 0.0.0.0:8090 with swagger/
    exit
fi
# start swagger editor server
if [ "$1"  = "swagger-edit" ]
then
    nohup $php_cmd -S 0.0.0.0:8091 -t swagger/edit &>var/logs/swagger-edit.log&
    echo swagger editor server start on 0.0.0.0:8091 with swagger/edit
    exit
fi

## stop all php
if [ "$1"  = "stop" ]
then
    ps -ef | grep php |grep -v grep |awk '{print $2}' |while read pid
    do
        kill -9 $pid
    done
    echo clear all php ... ... ...
fi
