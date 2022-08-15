# Mercado Livre Categorias

## _Consumindo API de Categorias_

## Features

-   Pagina para listar Categorias
-   Opção de Baixar categorias de outros países

## Tecnologias utilizadas

### Back End

-   PHP 8
-   Laravel 9

### Front End

-   JS
-   Jquery
-   Ajax - Para fazer requisições sem recarregar a pagina!
-   Bootstrap - Para estilizar as paginas.

### Estrutura

-   Docker
-   Sail - Pacote para utilizar laravel com Docker

### Banco de Dados

-   MySql

## Installation

```sh
./vendor/bin/sail up -d
copie o .env.example para .env (Já possui as chaves de acesso ao banco da imagem docker do mysql)
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
./vendor/bin/sail artisan queue:work --timeout=6000
```

No env existe uma variavel chamada LIMIT_BY_CATEGORY ela é usando para limitar a quantidade de categorias que podem ser cadastradas por nivel, a API do Brasil possui mais 3 mil categorias, e isso pode demorar, então caso queira fazer os testes com menos categorias basta configurar o LIMIT_BY_CATEGORY da forma que quiser, por padrão ele vem configurado como 2.

\*Caso queira deixar sem limite basta definir LIMIT_BY_CATEGORY=0

Verifique se a aplicação esta rodando acessando no navegador

```sh
http://localhost:8080
```

## License

MIT
