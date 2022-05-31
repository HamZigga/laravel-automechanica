## Информация
Проект интернет-ресурс Automechanica

## Стек технологий
* Docker
* Lavarel 8
* php 8
* mysql 8

## Запуск проекта на docker

`cp .env.example .env`

`cd ../docker`

`docker-compose up -d`

`docker exec -it mecha_fpm_1 sh`

`composer install`

`php artisan migrate`


внести домен automechanica.test в hosts 127.0.0.1 automechanica.test

## Запуск проекта на openserver

`cp .env.openserver .env`

`composer install`

`php artisan migrate`

