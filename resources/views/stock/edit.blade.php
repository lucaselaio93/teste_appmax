@extends('layouts.app')

@section('content')
<div class="card text-center">
    <div class="card-header">
    <h4>Editar Estoque</h4>
    </div>
    <div class="card-body">
        <h5 class="card-title">Editando estoque <b>{{ $stock->stock_name }}</b></h5>
        <div class="card-text">
            <form action="{{ route('update-stock', $stock->stock_id) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="stock_name" class="form-label">Nome do Estoque</label>
                    <input type="text" class="form-control" id="stock_name" name="stock_name" value="{{ $stock->stock_name }}">
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>
@endsection