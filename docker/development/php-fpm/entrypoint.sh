#!/bin/sh

# ждем пока база запустится
until pg_isready -h main-db -p 5432; do
  echo "Waiting for database..."
  sleep 2
done

php artisan key:generate

php artisan migrate --force

exec php-fpm