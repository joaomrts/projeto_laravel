@extends('layouts.main')

@section('title', 'Editar Produto')

@section('content')

<div id="produto-create-container" class="col-md-6 offset-md-0">
    <h1>Edite o seu Produto</h1>
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error )
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<form action="/produtos/update/{{ $produto->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nomeProduto">Produto:</label>
        <input type="text" id="nomeProduto" class="form-control" name="nomeProduto" placeholder="Nome do produto" value="{{ $produto->nomeProduto }}">
    </div>
    <div class="form-group">
        <label for="descriçãoProduto">Descrição:</label>
       <textarea name="descriçãoProduto" id="descriçãoProduto" class="form-control" placeholder="Descrição do Produto">{{ $produto->descriçãoProduto }}</textarea>
    </div>
    <div class="form-group">
        <label for="preço">Preço</label>
        <input type="number" name="preço" id="preço" class="form-control" placeholder="Valor em R$" value="{{ $produto->preço }}">
    </div>
    <div class="form-group">
        <label for="imagemProduto">Imagem do Produto:</label>
        <input type="file" name="imagemProduto" id="imagemProduto" class="form-control-file">
        <img src="/public/img/produtos/{{ $produto->imagemProduto }}" alt="{{ $produto->nomeProduto }}" class="img-preview">
    </div>
    <input type="submit" class="btn btn-primary" value="Editar Produto">
    </form>
</div>

@endsection
