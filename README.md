<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Nome do Projeto (Moot - Sistema de Busca)

Este é um projeto Laravel que implementa um sistema de busca com filtros combinados, utilizando Laravel Livewire para a interface dinâmica e Docker para o ambiente de desenvolvimento.

## 🚀 Tecnologias Utilizadas

Framework PHP: Laravel 12.x

Frontend Dinâmico: Laravel Livewire 3.x

CSS Framework: Tailwind CSS 3.x com Alpine.js

Ambiente de Desenvolvimento: Docker e Docker Compose

Banco de Dados: MySQL 8.0

PHP Unit Testing: Pest PHP (para testes unitários e de feature)

## ✨ Funcionalidades Principais

Mecanismo de busca de produtos por nome, categoria e marca.

Filtros combinados (AND lógico).

Possibilidade de selecionar múltiplas categorias e marcas.

Parâmetros de busca persistentes na URL.

Funcionalidade para limpar todos os filtros.

Componentes de interface reutilizáveis (Ex: cards de produto, listas de checkboxes).

Testes automatizados para as funcionalidades de busca.

## 📦 Como Iniciar o Projeto Localmente
Siga os passos abaixo para configurar e executar o projeto em sua máquina.

### Pré-requisitos

Certifique-se de ter as seguintes ferramentas instaladas em sua máquina:

Docker Desktop (ou Docker Engine e Docker Compose para Linux)

Git

Composer (para gerenciar dependências PHP - embora o Docker possa lidar com isso, ter o Composer localmente é útil).

Node.js e npm (ou Yarn, se preferir) - Versão LTS recomendada (v20 ou v22).

1. Clonar o Repositório
   
Abra seu terminal ou prompt de comando e clone o projeto:

```
git clone https://github.com/iagosilvamelo/moot-test.git
cd moot-test
```

2. Configurar Variáveis de Ambiente
   
Crie o arquivo .env a partir do exemplo fornecido:

```
cp .env.example .env
```
Abra o arquivo .env e configure as variáveis, especialmente as do banco de dados e do aplicativo.

Exemplo de configuração no .env:
```
APP_NAME="MootTest"
APP_ENV=local
APP_KEY=

DB_CONNECTION=mysql
DB_HOST=db # Nome do serviço do banco de dados no docker-compose
DB_PORT=3306
DB_DATABASE=laravel_db # Nome do banco de dados (configure no docker-compose também)
DB_USERNAME=root      # Usuário do banco de dados (configure no docker-compose também)
DB_PASSWORD=root_password # Senha do banco de dados (configure no docker-compose também)

# Docker Compose Variables (opcionais, mas bom para consistência)
APP_NAME=moot-test
DB_ROOT_PASSWORD=supersecretroot
```

3. Construir e Iniciar os Contêineres Docker
   
No diretório raiz do projeto, execute:

```
docker-compose up --build -d
```

--build: Força a reconstrução das imagens (especialmente a do app), o que é importante na primeira vez ou após alterações no Dockerfile.

-d: Inicia os contêineres em segundo plano (detached mode).

Aguarde alguns minutos enquanto o Docker baixa as imagens e constrói o ambiente.

4. Instalar Dependências PHP (Composer)
   
Execute o Composer dentro do contêiner app. Use docker-compose exec app para rodar comandos dentro do serviço app:

```
docker-compose exec app composer install
```

5. Gerar a Chave da Aplicação

```
docker-compose exec app php artisan key:generate
```

6. Instalar Dependências JavaScript (NPM/Yarn) e Compilar Assets

Entre no contêiner do app e instale as dependências do Node.js, depois compile os assets do frontend (CSS e JavaScript) usando Vite.

```
docker-compose exec app npm install
docker-compose exec app npm run build
```

7. Rodar Migrações e Seeders do Banco de Dados

Para criar as tabelas do banco de dados e preenchê-las com dados iniciais (usando factorys e seeders):

```
docker-compose exec app php artisan migrate --seed
```

8. Acessar a Aplicação

A aplicação estará acessível em seu navegador no endereço:

http://localhost

## 🧪 Executando Testes

Para executar os testes unitários e de feature do projeto:

```
docker-compose exec app php artisan test
```

Os testes serão executados utilizando uma base de dados SQLite em memória para garantir rapidez e isolamento.

## 🛑 Parar os Contêineres Docker

Quando terminar de trabalhar, você pode parar os contêineres:

```
docker-compose down
```
