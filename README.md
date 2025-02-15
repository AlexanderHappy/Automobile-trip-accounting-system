## Как развернуть приложение
1. Склонировать проект, переключить из ветки v3
2. Удаляем git  ```sudo rm -rf .git```
3. Скопировать env <br>```cp .env.example .env```
4. Отредактировать <br>```nano .env```
5. Копируем свои ssh ключи в директорию ./docker/ssh <br>
   Если под linux<br>
   ```cp ~/.ssh/id_rsa /{директория проекта}/docker/ssh/id_rsa```<br>
   ```cp ~/.ssh/id_rsa.pub /{директория проекта}/docker/ssh/id_rsa.pub```
6. Собрать контейнеры <br>```docker-compose build```
7. Поднять контейнеры  <br>```docker-compose up -d```
8. Установить зависимости композер ```docker-compose run --rm -u root app composer i```
9. Выполнить миграции ```docker-compose run --rm app php artisan migrate```
10. Для локальной разработки необходимо скопировать файл <br> ```cp .auth.json.template .auth.json```<br> и подставить нужные токены авторизации.
11. Сгенерировать laravel key ```docker-compose run --rm app php artisan key:generate```
12. Установить символическую ссылку на хранилище ```docker-compose run --rm app php artisan storage:link```

## Поднять фронт
1. Установить зависимости ```docker-compose run --rm npm ci``` или ```docker-compose run --rm npm i``` если установка впервые.
2. Собрать проект ```docker-compose run --rm --service-ports npm run build``` или ```docker-compose run --rm --service-ports npm run watch``` если нужно наблюдать за изменениями

Приложение доступно по ссылку http://localhost
phpMyAdmin http://localhost:81

## htaccess роутер версий проекта
В корне проекта нужен роутер для версий проекта. Смотри по аналогии на другие проекты
```
RewriteEngine On

RewriteCond %{HTTP_HOST} ^([^.]+)\.([^.]+)\.skyweb24\.ru$ [NC]
RewriteRule ^(.*)$ /%1/$1 [L]
```

## Дополнительно
Скрипт получения авторизации фрейма:<br>
```
JSON.stringify({"domain": AUTH_OBJECT.DOMAIN, "access_token": AUTH_OBJECT.AUTH_ID,"refresh_token": AUTH_OBJECT.REFRESH_ID, "member_id": AUTH_OBJECT.member_id, "dateStart": 0, "dateEnd": 0})
```
