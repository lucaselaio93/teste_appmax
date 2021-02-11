@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <form action="{{ route('store-stock') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="stock_name" class="form-label">Nome do Estoque</label>
                <input type="text" class="form-control" id="stock_name" name="stock_name">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
@endsection