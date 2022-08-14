@extends('layout.app')

@section('title', 'Início')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <h2> Mercado Livre Categorias - Funcionalidades </h2>
        </div>
        <div class="col-12">
            <h3> 1. Lista de Categorias </h3>
            <p> A lista de categorias foi desenvolvida pensando em bom desenpenho para apresentar a <strong>arvore de
                    categorias</strong>. Carregar todas elas ao
                chamar a pagina teria muito custo de processamento e um carregamento lento, tendo em vista que algumas
                possuem mais de <strong> 3 mil subcategorias </strong>, por isso motivo utilizando de requisições
                <strong>AJAX</strong>
                as subcategorias só são recarregadas ao clicar em uma categoria PAI, isso economiza processamento e
                utilização
                dos dados de internet do usuário.
            </p>
            <p>
                Como item adicional você pode escolher ver as categorias de qualquer país presente na API do Mercado Livre,
                por default as categorias brasileiras veem baixadas ao executar as seeders, para ver as demais de outros
                países
                veja o <strong> item 2.</strong>
            </p>
            <p> <a href="/categorias"> Veja aqui </a> </p>

            <h3> 2. Download de Categorias de outros países </h3>

            <p>
                Caso deseje fazer a sincronização do banco com categorias de outros países, você pode seleciona o país na
                pagina
                de categorias e depois clicar em "Baixar Categorias".
            </p>

            <p>
                O processo será feito em lote, logo o usuario não ficará preso na tela aguardando a requisição terminar,
                isso poderia
                demorar muito, então ao solicitar o download sera criado um <strong> JOB </strong> que sera adicionada a
                <strong> fila do laravel</strong>, fazendo com que o usuario possa continuar utilizando a plataforma mesmo
                sem o download finalizar por completo, permitindo ate que ele veja as categorias já cadastradas.
            </p>

            <p> <a href="/categorias?site_id=MLA"> Veja aqui </a> </p>

        </div>
    </div>
@endsection
