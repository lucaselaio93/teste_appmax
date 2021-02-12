@extends('layouts.app')

@section('content')
<div class="card text-center">
    <div class="card-header">
    <h4>Vincular Produto ao Estoque</h4>
    </div>
    <div class="card-body">
        <div class="card-text">
            <form action="{{ route('stock-product-add') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="mb-4 col">
                        <label for="stock_id" class="form-label">Estoque</label>
                        <select required name="stock_id" id="stock_id" class="custom-select">
                            <option value="" selected>Selecione o estoque...</option>
                            @foreach ($stocks as $stock)
                                <option value="{{ $stock->stock_id }}">{{ $stock->stock_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4 col">
                        <label for="product_id" class="form-label">Produto</label>
                        <select required name="product_id" id="product_id" class="custom-select">
                            <option value="" selected>Selecione o estoque...</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->product_id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="product_qnt" class="form-label">Quantidade no estoque</label>
                    <input required placeholder="Número de itens no estoque" type="number" class="form-control" id="product_qnt" name="product_qnt">
                </div>
                
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>
@endsection