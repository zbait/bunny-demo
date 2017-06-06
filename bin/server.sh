#!/bin/bash

# useage list
type=('停止所有服务' 'HTTP服务' 'WebSocket服务' 'WebSocket_Slave服务' 'swagger服务' 'swagger编辑器服务')
echo '选择要启动的服务序号：'
for i in ${!type[@]}
do
    echo '[' $i ']' "${type[$i]}"
done

# init
php_cmd="php "
read index
# start http server
if [ "$index"  = "1" ]
then
    nohup $php_cmd -S 0.0.0.0:8081 -t web/ web/index.php &>var/logs/http.log&
    echo http server start on 0.0.0.0:8081 with web/index.php
    exit
fi
# start ws server
if [ "$index"  = "2" ]
then
    $php_cmd ws/index.php
    #nohup $php_cmd ws/index.php &>var/logs/ws.log&
    echo websocket server start with ws/index.php
    exit
fi
# start ws slave server
if [ "$index"  = "3" ]
then
    $php_cmd ws/index_slave.php
    #nohup $php_cmd ws/index_slave.php &>var/logs/ws.log&
    echo websocket server start with ws/index_slave.php
    exit
fi
# start swagger server
if [ "$index"  = "4" ]
then
    nohup $php_cmd -S 0.0.0.0:8090 -t swagger/ &>var/logs/swagger.log&
    echo swagger server start on 0.0.0.0:8090 with swagger/
    exit
fi
# start swagger editor server
if [ "$index"  = "5" ]
then
    nohup $php_cmd -S 0.0.0.0:8091 -t swagger/edit &>var/logs/swagger-edit.log&
    echo swagger editor server start on 0.0.0.0:8091 with swagger/edit
    exit
fi

## stop all php
if [ "$index"  = "0" ]
then
    ps -ef | grep php |grep -v grep |awk '{print $2}' |while read pid
    do
        kill -9 $pid
    done
    echo clear all php ... ... ...
fi
