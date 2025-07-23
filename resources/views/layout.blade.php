<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Controle de Gastos</title>
        @vite(['resources/css/style.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
                <div class="container-fluid"> 
                    <a class="navbar-brand text-blue fw-bold fs-4" href="{{ route('index') }}">
                        <img src="{{ asset('logo.jpeg') }}" alt="Logo de Gasto" style="width: 50px;">
                        <span style="color: #4A90E2;">Controle de Gasto</span>
                    </a>                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex gap-2">
                                <a class="btn btn-blue" href="{{ route('indexGasto') }}">
                                    <i class="fas fa-list-alt me-1"></i> Ver Gastos
                                </a>
                                <a class="btn btn-blue" href="{{ route('createGasto') }}">
                                    <i class="fas fa-plus me-1"></i> Novo Gasto
                                </a>
                            </div>
                            <form class="d-flex" action="{{ route('procurarGasto') }}" method="GET" role="search">
                                <input class="form-control me-2" type="search" name="descricao" placeholder="Procurar por descrição...." aria-label="Search">
                                <button class="btn btn-blue" type="submit" title="Procurar">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <main class="container mt-4 pt-5">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('danger') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @yield('conteudo')
        </main>
    </body>
</html>