# Facilconsulta API

API REST para gerenciamento de consultas médicas desenvolvida com Laravel.

## Requisitos

- Docker
- Docker Compose
- WSL2 (para Windows)
- MySQL
- Git

## Instalação

1. Clone o repositório:
```bash
git clone https://github.com/seu-usuario/facilconsulta-api.git
cd facilconsulta-api
```

2. Copie o arquivo de ambiente:
```bash
cp .env.example .env
```

3. Instale as dependências do projeto usando o Laravel Sail:
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

4. Inicie os containers do Docker:
```bash
./vendor/bin/sail up -d
```

5. Gere a chave da aplicação:
```bash
./vendor/bin/sail artisan key:generate
```

6. Execute as migrações e seeders:
```bash
./vendor/bin/sail artisan migrate:fresh --seed
```

## Uso

A API estará disponível em `http://localhost:80`.

Para parar os containers:
```bash
./vendor/bin/sail down
```

## Documentação da API

- Baixe o Insomnia através do link: https://insomnia.rest/download
- Importe o arquivo que esta no diretorio docs: com o nome insomnia_endpoints.json
- Use a API

## Tecnologias Utilizadas

- Laravel 11
- MySQL
- Docker
- Laravel Sail
