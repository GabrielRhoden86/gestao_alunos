# 🎓 **API - Gestão de Alunos (Laravel 12)**

**Sistema de gestão de alunos desenvolvido com Laravel 12.**

---

## ⚙️ **Configuração do Ambiente**

### 1️⃣ Clone o repositório

```bash
git clone https://github.com/GabrielRhoden86/gestao_alunos.git
2️⃣ Instale as dependências
 
composer install
3️⃣ Copie o arquivo .env de exemplo
 
cp .env.example .env
4️⃣ Gere a chave da aplicação
 
php artisan key:generate
5️⃣ Configure o banco de dados

No arquivo .env, edite conforme necessário:  
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestao_alunos
DB_USERNAME=root
DB_PASSWORD=

6️⃣ Execute as migrações
php artisan migrate

7️⃣ Inicie o servidor

php artisan serve --port=8002

8️⃣ Gere a chave JWT
php artisan jwt:secret

📝 Copie a chave gerada e cole no .env:
JWT_SECRET=chave_gerada_aqui

9️⃣ Otimize a aplicação
php artisan optimize

🧪 Exemplos de como testar a aplicação:

🌱 Criar usuários de teste
php artisan db:seed

🔐 Autenticação JWT
🔑 Login para obter token
POST http://localhost:8000/api/login

👤 Acessar como Gestor
{
  "email": "gestor@email.com",
  "password": "230803"
}

👤 Acessar como Funcionário
{
  "email": "funcionario@email.com",
  "password": "230803"
}

📚 Funcionalidades da API
👨‍🎓 Cadastrar aluno
POST http://127.0.0.1:8002/api/criar-aluno
{
  "nome": "Gabriel Rhoden",
  "cpf": "12345678900",
  "data_nascimento": "1990-01-01",
  "turma": "TI-2025",
  "status": "Pendente"
}

✏️ Atualizar aluno
PATCH http://127.0.0.1:8002/api/editar-aluno/1
{
  "nome": "Gabriel Rhoden",
  "turma": "TI-2025",
  "status": "Cancelado"
}

📋 Listar todos os alunos
GET http://127.0.0.1:8002/api/listar-alunos

🔍 Filtrar alunos
GET http://127.0.0.1:8002/api/listar-alunos/?nome=Gabriel&status=pendente

🆔 Buscar aluno por ID
GET http://127.0.0.1:8002/api/buscar-aluno/1

✅ Requisitos
PHP >= 8.2

Laravel 12.x

MySQL

Composer

👨‍💻 Autor
Gabriel Rhoden
📧 gabrielrhdden@email.com
🔗 LinkedIn (adicione o link real se quiser)


