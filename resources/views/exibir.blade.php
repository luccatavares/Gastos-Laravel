@extends('layout')

@section('conteudo')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-blue mb-0">Resultados da Busca</h2>
        <a href="{{ route('indexGasto') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i> Voltar
        </a>
    </div>
    @if($dados->isNotEmpty())
        <div class="accordion shadow-sm" id="accordionGastos">
            @foreach ($dados as $gasto)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-{{ $gasto->id }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $gasto->id }}" aria-expanded="false" aria-controls="collapse-{{ $gasto->id }}">
                            <div class="d-flex w-100 justify-content-between align-items-center pe-2">                                
                                <div class="fw-bold text-blue">
                                    {{ $gasto->descricao }}
                                    <small class="d-block text-muted fw-normal">
                                        {{ date('d/m/Y', strtotime($gasto->data)) }}
                                    </small>
                                </div>
                                <span class="badge bg-primary rounded-pill fs-6">
                                    R$ {{ number_format($gasto->valor, 2, ',', '.') }}
                                </span>
                            </div>
                        </button>
                    </h2>                    
                    <div id="collapse-{{ $gasto->id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $gasto->id }}" data-bs-parent="#accordionGastos">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <strong><i class="fas fa-tags me-2 text-muted"></i>Categoria:</strong>
                                    <p class="ms-1">{{ $gasto->categoria }}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong><i class="fas fa-credit-card me-2 text-muted"></i>Forma de Pagamento:</strong>
                                    <p class="ms-1">{{ $gasto->formaPag }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('editGasto', $gasto->id) }}" class="btn btn-success">
                                    <i class="fas fa-edit me-2"></i>Editar
                                </a>
                                <form action="{{ route('destroyGasto', $gasto->id) }}" onsubmit="return confirm('Tem certeza que deseja excluir o gasto \'{{ $gasto->descricao }}\'?');">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash me-2"></i>Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="card text-center shadow-sm">
            <div class="card-body p-5">
                <i class="fas fa-search fa-3x text-muted mb-3"></i>
                <h4 class="card-title">Nenhum Gasto Encontrado</h4>
                <p class="card-text text-muted">Não encontramos resultados para a sua busca. Tente novamente com outros termos.</p>
            </div>
        </div>
    @endif
</div>
@endsection