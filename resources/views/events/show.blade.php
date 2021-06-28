@extends('layouts.main')

@section('title', $event->title)

@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/public/img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
            </div>
            <div id="info-container" class="col-md-6">
              <h1>{{ $event->title }}</h1>
               <p class="card-date"><ion-icon name="calendar-outline"></ion-icon> {{ date('d/m/Y', strtotime($event->date)) }}</p>
               <p class="event-city"><ion-icon name="location-outline"></ion-icon> {{ $event->city }}</p>
               <p class="event-participants"><ion-icon name="people-outline"></ion-icon> X Participantes</p>
               <p class="event-owner"><ion-icon name="star-outline"></ion-icon> {{ $eventOwner['name'] }} </p>
               <a href="#" class="btn btn-primary" id="event-submit">Confirmar Presença</a>
               <h3>O evento conta com:</h3>
                     @foreach ($event->items as $item)
                     <ul id="items-list">
                        <li><ion-icon name="play-outline"></ion-icon> <span>{{ $item }}</span> </li>
                </ul>
                    @endforeach
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Sobre o Evento:</h3>
                <p class="event-description">{{ $event->description }}</p>
            </div>

        </div>
    </div>

@endsection
