# CRUD PHP

CRUD desenvolvido em **PHP**, **MySQL** e **Bootstrap 5**, com operações completas de **CREATE, READ, UPDATE e DELETE (CRUD)** utilizando **PDO** para acesso ao banco de dados.

> Este projeto foi desenvolvido como forma de estudo e prática de PHP.

## 📸 Funcionalidades

- ✅ Listagem de usuários
- ✅ Cadastro de usuários
- ✅ Visualização dos dados de um usuário
- ✅ Edição de usuários
- ✅ Exclusão de usuários
- ✅ Senhas armazenadas com `password_hash()`
- ✅ Consultas utilizando **PDO** e *Prepared Statements*

## 🛠️ Tecnologias

- PHP
- MySQL
- PDO
- Bootstrap 5
- HTML5
- CSS3

## Ferramentas Utilizadas

- VS Code
- XAMPP v3.3.0
- MySQL Workbench 8.0

## 📂 Estrutura do Projeto

```text
CRUD-PHP/
│── acoes.php
│── conexao.php
│── database.sql
│── index.php
│── mensagem.php
│── usuario-create.php
│── usuario-edit.php
│── usuario-view.php
│── ...
```

## 🗄️ Banco de Dados

Crie um banco de dados chamado **testecrud** e execute o script abaixo:

```sql
CREATE DATABASE testecrud
DEFAULT CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE testecrud;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    data_nascimento DATE NOT NULL,
    senha VARCHAR(255) NOT NULL
);
```

## 🚀 Como executar

1. Clone o repositório

```bash
git clone https://github.com/MateusHellmann/CRUD-PHP.git
```

2. Coloque a pasta dentro do diretório do seu servidor local (XAMPP, WAMP, Laragon etc.).

3. Crie o banco de dados utilizando o script SQL disponível na seção **Banco de Dados**.

4. Configure as credenciais do banco em `conexao.php`.

5. Inicie o Apache e o MySQL.

6. Acesse no navegador:

```
http://localhost/CRUD-PHP
```

## 📚 Sobre o projeto

O projeto foi desenvolvido acompanhando o tutorial abaixo, porém algumas adaptações foram realizadas.

Enquanto o vídeo utiliza **MySQLi**, este projeto foi implementado utilizando **PDO**, empregando **Prepared Statements** para tornar as consultas mais seguras e próximas das boas práticas atuais do PHP.

## 🎥 Tutorial utilizado

- https://www.youtube.com/watch?v=aIQXgNmx_ug

## 📄 Licença

Este projeto foi desenvolvido para fins de estudo.