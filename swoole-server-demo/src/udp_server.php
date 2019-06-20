<?php
/**
 * Created by PhpStorm.
 * User: chingo
 * Date: 2019/6/20
 * Time: 17:13
 */

$serv = new swoole_server('0.0.0.0', 9502, SWOOLE_PROCESS, SWOOLE_SOCK_UDP);

$serv->set(array(
    'worker_num' => 4,
    'daemonize' => false,
    'backlog' => 128,
));

//事件驱动

$serv->on('Packet', function (swoole_server $server, $data, array $client_info) {
    echo '接受客户端信息:' . $data;
    var_dump($client_info);
    $server->sendto($client_info['address'], $client_info['port'], 'Udp数据：' . $client_info['address'] . ':' . $client_info['port']);
});

$serv->start();


