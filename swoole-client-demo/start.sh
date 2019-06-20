#!/bin/bash

name="swoole-client-demo"

docker stop $name
docker rm $name

docker run \
--name $name \
--restart=always \
--network "web" \
-v "$PWD/src":/var/www/html \
-d \
ldjbenben/swoole:4.1-php7.2-fpm
