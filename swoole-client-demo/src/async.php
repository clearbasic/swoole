<?php
/**
 * Created by PhpStorm.
 * User: chingo
 * Date: 2019/6/20
 * Time: 15:01
 */
/*
 * 服务端不能及时返回消息
 */
$client = new swoole_client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_ASYNC);

//绑定事件
$client->on("connect", function (swoole_client $cli) {
    $cli->send("GET / HTTP/1.1\r\n\r\n");
});
$client->on("receive", function (swoole_client $cli, $data) {
    echo "Receive: $data";
    $cli->send(str_repeat('A', 10) . "\n");
    sleep(1);
});
$client->on("error", function (swoole_client $cli, $client) {
    echo "error\n";
});
$client->on("close", function (swoole_client $cli) {
    echo "Connection close\n";
});

if (!$client->connect('swoole-server-demo', 9501, -1)) {
    exit("connect failed. Error: {$client->errCode}\n");
}
echo '开始接收数据：'.PHP_EOL;
