#!/bin/bash
set a
source .env
docker-compose build --no-cache
docker stop cylang_main
docker stop cylang_login_db
docker rm cylang_main
docker rm cylang_login_db
docker rmi -f cylang_login_db
docker rmi -f cylang_main
docker-compose up -d