@extends('layouts.main')

@section('title', $produto->nomeProduto)

@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-5">
                <img src="/public/img/produtos/{{ $produto->imagemProduto }}" class="img-fluid" alt="{{ $produto->nomeProduto }}">
            </div>
            <div id="produto-container" class="col-md-6">
              <h1>{{ $produto->nomeProduto }}</h1>
              <h2 class="event-participants">R${{ $produto->preço }}</h2>
               @if (!$hasUserReserva)
               <form action="/produto/reserva/{{ $produto->id }}" method="POST">
                @csrf
                <a href="/produto/reserva/{{ $produto->id }}"
                    class="btn btn-primary"
                    id="produto-submit"
                    onclick="produto.preventDefault();
                    this.closest('form').submit();"
                    >Reservar {{ $produto->nomeProduto }}</a>
            </form>
               @else
               <p class="already-joined-msg">Você já reservou este produto!</p>
               @endif
            <div class="col-md-12">
                <h3 class="reserva-container">Reservas já feitas: {{ count($produto->users) }}</h3>
            </div>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Sobre o Produto:</h3>
            <p class="event-description">{{ $produto->descriçãoProduto }}</p>
        </div>
        </div>
    </div>
@endsection

