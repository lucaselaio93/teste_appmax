@extends('layouts.app')

@section('content')
<div class="card text-center">
    <div class="card-header">
    <h4>Baixa de produtos no estoque</h4>
    </div>
    <div class="card-body">
        <div class="card-text">
            <form action="{{ route('product-stock-drop') }}" method="POST">
                @csrf
                <div class="mb-4 col">
                    <label for="stock_id" class="form-label">Primeiro selecione o Estoque deseja dar baixa</label>
                    <select required name="stock_id" id="stock_id" class="custom-select">
                        <option value="" selected>Selecione o estoque...</option>
                        @foreach ($stocks as $stock)
                            <option value="{{ $stock->stock_id }}">{{ $stock->stock_name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary"> Próximo <i class="fa fa-arrow-right"></i></button>
            </form>
        </div>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>
@endsection