
# Desafio Laravel - CRUD de Contatos

Este é um desafio de desenvolvimento em Laravel que aborda a criação de um CRUD (Create, Read, Update, Delete) completo para a entidade "Contato". O projeto utiliza Laravel 8.83.27 e inclui recursos avançados, como o uso de Repositories, Interfaces, Contracts, Services, Laravel/UI, Blade e PHP 7.4, para fornecer uma experiência de desenvolvimento de alta qualidade e organização do código.

## Objetivo do Projeto
O objetivo deste desafio é criar um sistema de gerenciamento de contatos, onde os usuários possam adicionar, visualizar, editar e excluir informações de contatos. Cada contato possui atributos como nome, email, telefone e outras informações relevantes.

### Como executar a aplicação:

Clonar o projeto
```bash
  git clone https://github.com/bladellano/challenge-alfasoft.git
```

Vá para o diretório do projeto
```bash
  cd challenge-alfasoft
  cp .env.example .env
  composer install
  php artisan key:generate
  php artisan storage:link
  npm install
  npm run dev
```
E aguarde a montagem de toda a aplicação...

Configurar no arquivo `.env` as credenciais de acordo com sua necessidade.

Criar um novo banco de dados chamado `recruitment`.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=recruitment
DB_USERNAME=root
DB_PASSWORD=root
```
Subir a base de dados:
```
php artisan migrate && php artisan db:seed
```

Subir o projeto:
```
php artisan serve --port=8080
```

Clique: `http://127.0.0.1:8080/`
# Desenvolvido por

Esta aplicação foi desenvolvida por [Caio Dellano Nunes da Silva.](https://cdnssystems.com.br/) 

[![linkedin](https://img.shields.io/badge/linkedin-0A66C2?style=for-the-badge&logo=linkedin&logoColor=white)](https://www.linkedin.com/in/bladellano/)


