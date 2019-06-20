set name=swoole-server-demo

docker stop %name%
docker rm %name%

docker run ^
--name %name% ^
--restart=always ^
--network "web" ^
-v %~dp0/src:/usr/app ^
-d ldjbenben/swoole:4.1-php7.2-cli ^
php /usr/app/index.php
