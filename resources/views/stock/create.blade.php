@extends('layouts.app')

@section('content')


<div class="card text-center">
    <div class="card-header">
    <h4>Cadastrar Estoque</h4>
    </div>
    <div class="card-body">
        <div class="card-text">
            <form action="{{ route('store-stock') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="stock_name" class="form-label">Nome do Estoque</label>
                    <input type="text" class="form-control" id="stock_name" name="stock_name">
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>
@endsection