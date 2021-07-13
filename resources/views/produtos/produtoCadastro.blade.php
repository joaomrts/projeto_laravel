@extends('layouts.main')

@section('title', 'Cadastrar Produto')

@section('content')

<div id="produto-create-container" class="col-md-6 offset-md-0">
    <h1>Cadastre o seu Produto</h1>
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error )
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action="/produtos" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="nomeProduto">Produto:</label>
        <input type="text" class="form-control" id="nomeProduto" name="nomeProduto" placeholder="Nome do produto" value="{{ old('nomeProduto') }}">
    </div>
    <div class="form-group">
        <label for="descriçãoProduto">Descrição:</label>
       <textarea name="descriçãoProduto" id="descriçãoProduto" class="form-control" placeholder="Descrição do Produto">{{ old('descriçãoProduto') }}</textarea>
    </div>
    <div class="form-group">
        <label for="preço">Preço</label>
        <input type="number" step=".01" name="preço" id="preço" class="form-control" placeholder="Valor em R$">{{ old('preço') }}</input>
    </div>
    <div class="form-group">
        <label for="imagemProduto">Imagem do Produto:</label>
        <input type="file" name="imagemProduto" id="imagemProduto" class="form-control-file">
    </div>
    <input type="submit" class="btn btn-primary" value="Cadastrar Produto">
    </form>
</div>

@endsection
