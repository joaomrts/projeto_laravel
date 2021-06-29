@extends('layouts.main')

@section('title', 'Eventos')

@section('content')


<div id="search-container" class="col-md-12">
    <h1>Busque um Evento</h1>
    <form action="" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">

    </form>
</div>
<div id="events-container" class="col-md-12">
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
            <p class="card-date">{{ date('d/m/Y', strtotime($event->data)) }}</p>
            <h5 class="card-title">{{ $event->evento }}</h5>
            <p class="card-participants">X Participantes</p>
            <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        @endforeach
        @if (count($events) == 0 && $search)
            <p>Não foi possível encontrar nenhum evento com {{ $search }}</p>
            <p><a href="/">Ver todos eventos</a></p>
        @elseif (count($events) == 0)
        <p>Não há eventos disponíveis</p>
        @endif
    </div>
</div>

@endsection
