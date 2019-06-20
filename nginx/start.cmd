set name="web-nginx"

docker stop %name%
docker rm %name%

docker run ^
--name %name% ^
--restart=always ^
--network "web" ^
-p 8080:80 ^
-v %~dp0/../swoole-client-demo/src:/usr/share/nginx/html/swoole-client-demo ^
-v %~dp0/conf.d:/usr/share/nginx/conf.d ^
-v %~dp0/nginx.conf:/etc/nginx/nginx.conf:ro ^
-d ^
nginx:alpine
