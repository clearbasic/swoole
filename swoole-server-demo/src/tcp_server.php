<?php

$serv = new swoole_server('0.0.0.0', 9501, SWOOLE_BASE, SWOOLE_SOCK_TCP);

$serv->set(array(
    'worker_num' => 4,
    'daemonize' => false,
    'backlog' => 128,
));

//事件驱动
$serv->on('Connect', function(swoole_server $server, int $fd, int $reactorId){
	echo 'Connect:' . $fd;
});

$serv->on('Receive', function(swoole_server $server, int $fd, int $reactor_id, string $data){
	echo 'Receive:' . $data;
	$server->send($fd, 'Receive:' . $data);
});

$serv->on('Close', function(swoole_server $server, int $fd, int $reactorId){
	echo 'Close:' . $fd;
});

$serv->start();


