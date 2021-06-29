@extends('layouts.main')

@section('title', 'Editar Evento')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-0">
    <h1>Edite o seu evento</h1>
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error )
            <li>{{ $error }}</li>
        @endforeach
    </ul>

@endif
    <form action="/events/update{{ $event->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="imagem">Imagem do Evento:</label>
            <input type="file" name="imagem" id="imagem" class="form-control-file">
            <img src="/public/img/events/{{ $event->imagem }}" alt="{{ $event->evento }}" class="img-preview">
        </div>
    <div class="form-group">
        <label for="evento">Evento:</label>
        <input type="text" class="form-control" id="evento" name="evento" placeholder="Nome do evento" value="{{ $event->evento }}">
    </div>
    <div class="form-group">
        <label for="data">Data do evento:</label>
        <input type="date" class="form-control" id="data" name="data">
    <div class="form-group">
        <label for="cidade">Cidade:</label>
        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Local do evento" value="{{ $event->cidade }}">
    </div>
    <div class="form-group">
        <label for="title">O evento é privado?</label>
      <select name="private" id="private" class="form-control">
          <option value="0">Não</option>
          <option value="1" {{ $event->private == 1 ? "selected='selected'" : "" }}>Sim</option>
      </select>
    </div>
    <div class="form-group">
        <label for="descrição">Descrição:</label>
       <textarea name="descrição" id="descrição" class="form-control" placeholder="O que vai acontecer no evento?">{{ $event->descrição }}</textarea>
    </div>
    <label for="title">Adicione itens de infraestrutura:</label>
    <div class="form-group">
        <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
    </div>
    <div class="form-group">
      <input type="checkbox" name="items[]" value="Palco"> Palco
  </div>
  <div class="form-group">
      <input type="checkbox" name="items[]" value="Open bar"> Open bar
  </div>
  <div class="form-group">
      <input type="checkbox" name="items[]" value="Open food"> Open food
  </div>
  <div class="form-group">
      <input type="checkbox" name="items[]" value="Brindes"> Brindes
  </div>
    <pre>
    </pre>
    <input type="submit" class="btn btn-primary" value="Editar Evento">
    </form>
</div>

<br/>
@endsection
