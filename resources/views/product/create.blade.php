@extends('layouts.app')

@section('content')
<div class="card text-center">
    <div class="card-header">
    <h4>Cadastrar Produto</h4>
    </div>
    <div class="card-body">
        <div class="card-text">
            <form action="{{ route('store-product') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="mb-4 col">
                        <label for="product_name" class="form-label">Nome do Produto</label>
                        <input required placeholder="Nome do Produto" type="text" class="form-control" id="product_name" name="product_name">
                    </div>
                    <div class="mb-4 col">
                        <label for="product_sku" class="form-label">SKU do Produto</label>
                        <input placeholder="Ex: 'PR15BRGG' " type="text" class="form-control" id="product_sku" name="product_sku">
                    </div>
                </div>
                
                <!-- <div class="row">
                    <div class="mb-4 col">
                        <label for="stock_id" class="form-label">Estoque</label>
                        <select name="stock_id" id="stock_id" class="custom-select">
                            <option value="" selected>Selecione o estoque...</option>
                            @foreach ($stocks as $stock)
                                <option value="{{ $stock->stock_id }}">{{ $stock->stock_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4 col">
                        <label for="product_qnt" class="form-label">Quantidade no estoque</label>
                        <input placeholder="Número de itens no estoque" type="number" class="form-control" id="product_qnt" name="product_qnt">
                    </div>
                </div> -->
                
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>
@endsection