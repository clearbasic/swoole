set name=swoole-client-demo

docker stop %name%
docker rm %name%

echo %~dp0

docker run ^
--name %name% ^
--restart=always ^
--network "web" ^
-v %~dp0/src:/var/www/html ^
-d ^
ldjbenben/swoole:4.1-php7.2-fpm
