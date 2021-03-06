<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <!-- Fonte do Google -->
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Open+Sans');
        </style>

        <!-- CSS Bootstrap -->

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- CSS da aplicação -->

        <link rel="stylesheet" href="/css/styles.css">
        <script src="/js/scripts.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/logo_att.png" alt="Events">
                    </a>
                    <ul class="navbar-nav">
                        @auth
                        <li class="nav-item">
                            <a href="/dashboardProdutos" class="nav-link">Meus Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link">Meus Eventos</a>
                         </li>
                         <li class="nav-item">
                            <a href="/produto/cadastro" class="nav-link">Cadastrar Produtos</a>
                        </li>
                         <li class="nav-item">
                            <a href="/events/create" class="nav-link">Cadastrar Eventos</a>
                       </li>
                         <li class="nav-form">
                            <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout"
                            class="nav-link"
                            id="form-logout"
                            onclick="event.preventDefault();
                            this.closest('form').submit();">
                            Sair
                            </a>
                            </form>
                         </li>
                        @endauth
                       @guest
                       <li class="nav-item">
                        <a href="/login" class="nav-link">Entrar</a>
                     </li>
                     <li class="nav-item">
                        <a href="/register" class="nav-link">Registrar-se</a>
                     </li>
                       @endguest
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if (session('msg'))
                    <p class="msg">{{ session('msg') }}</p></p>
                    @endif
                    @yield('content')
                </div>
            </div>
        </main>
        <footer>
            <p>Eventos &copy; 2021</p>
        </footer>
        <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    </body>
</html>
