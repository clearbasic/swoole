name="web-nginx"

docker stop $name
docker rm $name

docker run \
--name $name \
--restart=always \
--network "web" \
-p 8080:80 \
-v $PWD/../swoole-client-demo/src:/usr/share/nginx/html/swoole-client-demo \
-v `pwd`/conf.d:/usr/share/nginx/conf.d \
-v `pwd`/nginx.conf:/etc/nginx/nginx.conf:ro \
-v `pwd`/logs:/usr/share/nginx/logs \
-it \
nginx:alpine
#-d \
