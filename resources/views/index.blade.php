@extends('layout')

@section('conteudo')
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
            <h1 class="display-4 fw-bold lh-1 text-blue mb-3">Controle de Gastos</h1>
            <p class="col-lg-10 fs-4 text-muted">
                Bem-vindo! Adicione um novo gasto ou veja sua lista completa de lançamentos.
            </p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <div class="d-grid gap-3">
                <a href="{{ route('createGasto') }}" class="btn btn-blue btn-lg">
                    <i class="fas fa-plus-circle me-2"></i>Adicionar Novo Gasto
                </a>
                <a href="{{ route('indexGasto') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-list-alt me-2"></i>Ver Todos os Gastos
                </a>                
            </div>
        </div>
    </div>
</div>
@endsection