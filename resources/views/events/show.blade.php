@extends('layouts.main')

@section('title', $event->evento)

@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/public/img/events/{{ $event->imagem }}" class="img-fluid" alt="{{ $event->evento }}">
            </div>
            <div id="info-container" class="col-md-6">
              <h1>{{ $event->evento }}</h1>
               <p class="card-date"><ion-icon name="calendar-outline"></ion-icon> {{ date('d/m/Y', strtotime($event->data)) }}</p>
               <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{ $event->cidade }}</p>
               <p class="event-participants"><ion-icon name="people-outline"></ion-icon> {{ count($event->users) }} Participante(s)</p>
               <p class="event-owner"><ion-icon name="star-outline"></ion-icon> {{ $eventOwner['name'] }} </p>
               @if(!$hasUserJoined)
               <form action="/events/join/{{ $event->id }}" method="POST">
                @csrf
                 <a href="/events/join/{{ $event->id }}"
                    class="btn btn-primary"
                    id="event-submit"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    Confirmar Presença
                 </a>
                </form>
               @else
                   <p class="already-joined-msg">Você já está participando deste evento!</p>
               @endif
               <h3>O evento conta com:</h3>
                     @foreach ($event->items as $item)
                     <ul id="items-list">
                        <li><ion-icon name="checkmark-outline"></ion-icon> <span>{{ $item }}</span> </li>
                </ul>
                    @endforeach
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre o Evento:</h3>
                <p class="event-description">{{ $event->descrição }}</p>
            </div>

        </div>
    </div>

@endsection
