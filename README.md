## Как развернуть приложение
1. Собрать контейнеры ```docker-compose build```
2. Поднять контейнеры  ```docker-compose up -d```
3. Установить зависимости композер ```docker-compose run --rm -u root app composer i```
4. Выполнить миграции ```docker-compose run --rm app php artisan migrate```
5. Сгенерировать laravel key ```docker-compose run --rm app php artisan key:generate```
6. Установить символическую ссылку на хранилище ```docker-compose run --rm app php artisan storage:link```

## Поднять фронт
1. Установить зависимости ```docker-compose run --rm npm ci``` или ```docker-compose run --rm npm i``` если установка впервые.
2. Собрать проект ```docker-compose run --rm --service-ports npm run build``` или ```docker-compose run --rm --service-ports npm run watch``` если нужно наблюдать за изменениями

