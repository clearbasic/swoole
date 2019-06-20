<?php
$client = new swoole_client(SWOOLE_SOCK_TCP);
if (!$client->connect('swoole-server-demo', 9501, -1))
{
    exit("connect failed. Error: {$client->errCode}\n");
}
$client->send("Hello Swoole!\n");
echo $client->recv();
$client->close();
phpinfo();

