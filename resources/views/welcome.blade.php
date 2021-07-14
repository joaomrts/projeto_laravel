@extends('layouts.main')

@section('title', 'Souza e Cambos')

@section('content')


<div id="search-container" class="col-md-12">
    <h1>Busque um Evento ou Produto</h1>
    <form action="" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">

    </form>
</div>
<div id="events-container" class="col-md-8">
    @if ($search)
    <h2>Resultado da busca por: {{ $search }}</h2>
    @else
    <h2>Próximos Eventos</h2>
    <p class="subtitle">Veja os Eventos dos proximos dias</p>
    @endif
    <div id="cards-container" class="row">
        @foreach ($events as $event)
        <div class="card col-md-3">
            <img src="public/img/events/{{ $event->imagem }}" alt="{{ $event->evento }}">
            <div class="card-body">
            <h5 class="card-title">{{ $event->evento }}</h5>
            <p class="card-date">{{ date('d/m/Y', strtotime($event->data)) }}</p>
            <p class="card-participants">Participante(s): {{ count($event->users) }}</p>
            <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        @endforeach
        @if (count($events) == 0 && $search)
            <p>Não foi possível encontrar nenhum evento com {{ $search }}</p>
            <p><a href="/">Ver todos eventos</a></p>
        @elseif (count($events) == 0)
        <p>Não há eventos disponíveis</p>
        <p><a href="/events/create/">Já tem uma conta? Cadastre um evento!</a></p>
        @endif
    </div>
</div>
<div id="events-container" class="col-md-8">
    @if ($search)
    <h2>Resultado da busca por: {{ $search }}</h2>
    @else
    <h1>Produtos</h1>
        <p class="subtitle">Veja nossos produtos exclusivos</p>
    @endif
        <div id="cards-container" class="row">
            @foreach ($produtos as $produto)
            <div class="card col-md-3">
                <img src="public/img/produtos/{{ $produto->imagemProduto }}" alt="{{ $produto->nomeProduto }}">
                <div class="card-body">
                <h5 class="card-title">{{ $produto->nomeProduto }}</h5>
                <p class="card-preço">R${{ $produto->preço }}</p>
                <p class="card-date">{{ $produto->descriçãoProduto }}</p>
                <p class="card-participants">Reservas feitas: {{ count($produto->users) }}</p>
                <a href="/produtos/{{ $produto->id }}" class="btn btn-primary">Ver Produto</a>
                </div>
            </div>
            @endforeach
            @if (count($produtos) == 0 && $search)
            <p>Não foi possível encontrar nenhum produto com {{ $search }}</p>
            <p><a href="/">Ver todos os produtos</a></p>
        @elseif (count($produtos) == 0)
        <p>Não há produtos disponíveis</p>
        <p><a href="/produto/cadastro/">Já tem uma conta? Cadastre um produto!</a></p>
        @endif
        </div>
        </div>
    </div>
@endsection
