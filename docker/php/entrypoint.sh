#!/bin/bash
until nc -z db 3306; do
  echo "⏳ Aguardando o banco de dados iniciar..."
  sleep 3
done

echo "✅ Banco de dados disponível!"

composer install

php artisan key:generate

php artisan jwt:secret --force

php artisan optimize

exec php-fpm
