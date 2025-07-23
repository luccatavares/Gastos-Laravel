@extends('layout')

@section('conteudo')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">
            <div class="card shadow-sm border-light-subtle">
                <div class="card-header bg-blue text-white">
                    <h4 class="mb-0 text-center fw-light"><i class="fas fa-edit me-2"></i>Editar Gasto</h4>
                </div>
                <div class="card-body p-4 p-md-5">
                    <form action="{{ route('updateGasto', $dados->id) }}" method="POST">
                        @csrf
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição do gasto" value="{{ $dados->descricao }}" required>
                            <label for="descricao"><i class="fas fa-pen me-2 text-muted"></i>Descrição</label>
                        </div>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="floatval" class="form-control" id="valor" name="valor" placeholder="0,00" value="{{ $dados->valor }}" required>
                                    <label for="valor"><i class="fas fa-coins me-2 text-muted"></i>Valor</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="data" name="data" placeholder="Data" value="{{ $dados->data }}" required>
                                    <label for="data"><i class="fas fa-calendar-alt me-2 text-muted"></i>Data</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-4">
                            <select class="form-select" id="categoria" name="categoria" aria-label="Selecione a Categoria" required>
                                <option disabled>Selecione uma categoria</option>
                                <option value="Alimentação" {{ $dados->categoria == 'Alimentação' ? 'selected' : '' }}>Alimentação</option>
                                <option value="Transporte" {{ $dados->categoria == 'Transporte' ? 'selected' : '' }}>Transporte</option>
                                <option value="Moradia" {{ $dados->categoria == 'Moradia' ? 'selected' : '' }}>Moradia</option>
                                <option value="Lazer" {{ $dados->categoria == 'Lazer' ? 'selected' : '' }}>Lazer</option>
                                <option value="Saúde" {{ $dados->categoria == 'Saúde' ? 'selected' : '' }}>Saúde</option>
                                <option value="Outros" {{ $dados->categoria == 'Outros' ? 'selected' : '' }}>Outros</option>
                            </select>
                            <label for="categoria"><i class="fas fa-tags me-2 text-muted"></i>Categoria</label>
                        </div>
                        <div class="form-floating mb-4">
                            <select class="form-select" id="formaPag" name="formaPag" aria-label="Selecione a Forma de Pagamento" required>
                                <option disabled>Selecione uma forma</option>
                                <option value="Cartão de Crédito" {{ $dados->formaPag == 'Cartão de Crédito' ? 'selected' : '' }}>Cartão de Crédito</option>
                                <option value="Cartão de Débito" {{ $dados->formaPag == 'Cartão de Débito' ? 'selected' : '' }}>Cartão de Débito</option>
                                <option value="Pix" {{ $dados->formaPag == 'Pix' ? 'selected' : '' }}>Pix</option>
                                <option value="Dinheiro" {{ $dados->formaPag == 'Dinheiro' ? 'selected' : '' }}>Dinheiro</option>
                            </select>
                            <label for="formaPag"><i class="fas fa-credit-card me-2 text-muted"></i>Forma de Pagamento</label>
                        </div>
                        <div class="d-grid d-md-flex justify-content-md-end gap-2 mt-5">
                            <a href="{{ route('indexGasto') }}" class="btn btn-danger px-4">
                                <i class="fas fa-times me-2"></i>Cancelar
                            </a>
                            <button type="submit" class="btn btn-success px-4">
                                <i class="fas fa-sync-alt me-2"></i>Atualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection