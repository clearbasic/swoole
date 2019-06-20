<?php
/**
 * Created by PhpStorm.
 * User: chingo
 * Date: 2019/6/19
 * Time: 16:29
 */
$client = new swoole_client(SWOOLE_SOCK_TCP);
if (!$client->connect('swoole-server-demo', 9501, -1))
{
    exit("connect failed. Error: {$client->errCode}\n");
}
$client->send("这是同步客户端\n");
echo $client->recv();
$client->close();

