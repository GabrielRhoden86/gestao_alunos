API GESTÃO DE ALUNOS UTILIZANDO LARAVEL 12
_________________________configuração_______________________________]

1 - git clone https://github.com/GabrielRhoden86/gestao_alunos.git
2 - composer install
3 - copy .env.example .env
4 - php artisan key:generate

5 - 
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestao_alunos
DB_USERNAME=root
DB_PASSWORD=

6 - php artisan migrate

7 - php artisan serve --port 8002

8 - php artisan optimize
__________________________Como utilizar a aplicação______________
1 - criar usuários fake para teste autenticação jwt 
php artisan db:seed

2 - faça o login para receber o token de acesso:
POST http://localhost:8000/api/login

{
  "email": "gestor@email.com",
  "password": "230803"
}

{
  "email": "funcionario@email.com",
  "password": "230803"
}



8 - Cadastrar aluno:
http://127.0.0.1:8002/api/criar-aluno
body:
{
  "nome": "Gabriel Rhoden",
  "cpf": "12345678900",
  "data_nascimento": "1990-01-01",
  "turma": "TI-2025",
  "status": "Pendente"
}

9 - atualizar dados aluno:
http://127.0.0.1:8002/api/editar-aluno/1
{
  "nome": "Gabriel Rhoden",
  "turma": "TI-2025",
  "status": "Cancelado"
}

10 - listar todos alunos:
http://127.0.0.1:8002/api/listar-alunos

11 - filtrar alunos:
http://127.0.0.1:8002/api/listar-alunos/?nome=Gabriel&status=pendente

11 - busca aluno por id:
http://127.0.0.1:8002/api/buscar-aluno/1
