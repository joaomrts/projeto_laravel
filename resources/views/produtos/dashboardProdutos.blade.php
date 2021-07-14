@extends('layouts.main')

@section('title', 'Dashboard de Produtos')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Produtos</h1>
</div>
<div class="col-md-10 col-sm-5 col-xs-2 offset-md-1 dashboard-events-container">
    @if (count($produtos) > 0)
    <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope='col'>Reservados</th>
                    <th scope="col">Ações</th>
                 </tr>
            </thead>
        <tbody>
        @foreach ($produtos as $produto)
                <tr>
                    <td scropt="row">{{ $loop->index + 1}}</td>
                    <td><a href="/produtos/{{ $produto->id }}">{{ $produto->nomeProduto }}</a></td>
                    <td>{{ count($produto->users) }}</td>
                    <td>
                        <a href="/produtos/editar/{{ $produto->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
                        <form action="/produtos/{{ $produto->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn" onclick="if (!confirm('Deseja realmente excluir?')) { return false }"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                        </form>
                    </td>
               </tr>
        @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não tem produtos! <a href="/produto/cadastro">Cadastrar Produto</a></p>
    @endif
</div>

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Minhas reservas de produto</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if (count($produtoAsReserva)>0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th>Quantidade</th>
                <th scope="col">Ações</th>
             </tr>
        </thead>
    <tbody>
    @foreach ($produtoAsReserva as $produto)
        <div class="col-md-10 offset-md-1 dashboard-events-container">
            <tr>
                <td scropt="row">{{ $loop->index + 1}}</td>
                <td><a href="/produtos/{{ $produto->id }}">{{ $produto->nomeProduto }}</a></td>
                <td>1</td>
                <td>
                    <form action="/produtos/leave/{{ $produto->id }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger delete-btn">
                        <ion-icon name="exit-outline"></ion-icon>
                        Cancelar reserva
                    </button>
                    </form>
                </td>
           </tr>
        </div>
    @endforeach
    </tbody>
</table>
    <p class="dashboard-events-container"><a href="/">Início</a></p>
    @else
</div>
    <p>Você ainda não tem nenhuma reserva <a href="/">Ver Produtos</a></p>
    @endif
</div>

@endsection
