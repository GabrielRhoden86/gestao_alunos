

⚙️ 4. Comandos para subir o projeto
# Clone o projeto
git clone https://github.com/GabrielRhoden86/gestao_alunos.git
cd gestao_alunos

# Crie o .env
cp .env.example .env

# Suba os containers
docker-compose up -d --build

# Acesse o container
docker exec -it gestao-alunos-app bash

# Instale as dependências PHP
composer install

# Gere a chave
php artisan key:generate

# Rode as migrations
php artisan migrate

# Gere a chave JWT
php artisan jwt:secret

# Otimize
php artisan optimize

# Rode os seeders
php artisan db:seed

✅ Estrutura de arquivos:

gestao-alunos/
├── app/
├── bootstrap/
├── config/
├── database/
├── docker/
│   ├── php/
│   │   └── Dockerfile
│   └── nginx/
│       └── default.conf
├── public/
├── routes/
├── storage/
├── .env
├── docker-compose.yml
├── artisan
└── ...