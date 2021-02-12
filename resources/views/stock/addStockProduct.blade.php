@extends('layouts.app')

@section('content')
<div class="card text-center">
    <div class="card-header">
    <h4>Entrada de produtos no estoque</h4>
    </div>
    <div class="card-body">
        <div class="card-text">
            <h5><b>{{ $stock->stock_name }}</b></h5>
            @if(count($products)>0)
                <table class="table">
                    <thead>
                        <th>Produto</th>
                        <th>Quantidade em estoque</th>
                        <th>Valor da entrada no estoque</th>
                        <th>Ação</th>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <form action="{{ route('stock-product-add') }}" name="product{{$product->product_id}}" method="POST">
                        <input type="hidden" name="stock_id" value="{{$stock->stock_id}}">
                        <input type="hidden" name="product_id" value="{{$product->product_id}}">
                        <input type="hidden" name="product_qnt" value="{{$product->product_qnt}}">
                        @csrf
                            <td>
                                {{ $product->product_name }}
                            </td>
                            <td>
                                {{ $product->product_qnt }}
                            </td>
                            <td>
                                <input name="qnt_entrada" required type="number" value=""> 
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                            </td>
                        </form>
                    @endforeach
                    </tr>
                    </tbody>
                </table>
            @else
            <div class="alert alert-warning" role="alert">
                Não existem produtos vinculados a este estoque.
            </div>
            @endif
        </div>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>
@endsection