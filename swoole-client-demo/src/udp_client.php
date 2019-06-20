<?php
/**
 * Created by PhpStorm.
 * User: chingo
 * Date: 2019/6/20
 * Time: 16:26
 */
$client = new swoole_client(SWOOLE_SOCK_UDP, SWOOLE_SOCK_SYNC);

$client->sendto('172.18.0.2', 9502, "这是Udp同步客户端\n");
echo $client->recv();
