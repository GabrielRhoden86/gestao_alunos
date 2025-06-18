# Configuração 🐳 Docker

⚙️ Comandos para subir o projeto:

```bash
git clone https://github.com/GabrielRhoden86/gestao_alunos.git
cd gestao_alunos

cp .env.example .env

docker-compose up -d --build

docker exec -it gestao-alunos-app bash

composer install

php artisan key:generate

php artisan migrate

php artisan jwt:secret

php artisan optimize

php artisan db:seed
