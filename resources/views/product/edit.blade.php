@extends('layouts.app')

@section('content')
<div class="card text-center">
    <div class="card-header">
    <h4>Cadastrar Produto</h4>
    </div>
    <div class="card-body">
        <div class="card-text">
            <form action="{{ route('update-product', $product->product_id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="mb-4 col">
                        <label for="product_name" class="form-label">Nome do Produto</label>
                        <input value="{{ $product->product_name }}" placeholder="Nome do Produto" type="text" class="form-control" id="product_name" name="product_name">
                    </div>
                    <div class="mb-4 col">
                        <label for="product_sku" class="form-label">SKU do Produto</label>
                        <input value="{{ $product->product_sku }}" placeholder="Ex: 'PR15BRGG' " type="text" class="form-control" id="product_sku" name="product_sku">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>
@endsection