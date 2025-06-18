#!/bin/sh

echo "Aguardando o banco de dados..."
while ! mysql -h "$DB_HOST" -P "$DB_PORT" -u "$DB_USERNAME" -p"$DB_PASSWORD" -e "select 1" >/dev/null 2>&1; do
  echo "Banco de dados indisponível - aguardando 3 segundos..."
  sleep 3
done

echo "Banco de dados disponível! Iniciando comandos Laravel..."

if [ ! -d "vendor" ]; then
  composer install --no-interaction --prefer-dist
fi

if [ ! -f "bootstrap/cache/app.php" ]; then
  php artisan key:generate
fi

php artisan migrate --force

if [ ! -f "config/jwt.php" ]; then
  php artisan jwt:secret
fi

php artisan optimize

echo "Setup Laravel concluído. Executando o comando principal..."

exec "$@"
