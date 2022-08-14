# Mercado Livre Categorias

## _Consumindo API de Categorias_

## Features

-   Pagina para listar Categorias
-   Opção de Baixar categorias de outros países
-

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
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
./vendor/bin/sail artisan queue:work --timeout=6000
acesse http://localhost:8080
```

Verifique se a aplicação esta rodando acessando no navegador

```sh
http://localhost:8080
```

## License

MIT
