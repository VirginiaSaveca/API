#!/usr/bin/bash

cp ./.env.example ./.env

composer install

php artisan key:generate
php artisan storage:link

npm install
npm run build

#php artisan migrate:fresh --seed >/dev/null 2>&1 || php artisan migrate --seed
