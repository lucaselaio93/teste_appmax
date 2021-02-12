@extends('layouts.app')

@section('content')
<style>
.tr-cabecalho{
    background-color: #dee2e6;
}
td, th {
    border-left: 1px solid #d8d8d8;
    border-right: 1px solid #d8d8d8;
}
</style>

<div class="card text-center">
    <div class="card-header">
    <h4>Listagem de produtos</h4>
    </div>
    <div class="card-body">
        <h5 class="card-title"></h5>
        <div class="card-text">
        <table class="table table-striped text-center">
        
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">SKU</th>
                    <th scope="col">Quantidade em estoque</th>
                    <th scope="col">Estoque</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            
            
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $product['product_id'] }}</th>
                        <td>{{ $product['product_name'] }}</td>
                        <td>{{ $product['product_sku'] }}</td>
                        <td>{{ $product['product_qnt'] }}</td>
                        <td>{{ $product['stock_name'] }}</td>
                        <td class="td-btn">
                        
                            <a class="btn btn-outline-info"" href="{{ route('edit-product', $product['product_id']) }}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td class="td-btn">
                            <form action="{{ route('delete-product', $product['product_id']) }}" method="POST">
                                @csrf
                                @method('DELETE') 
                                @if($product['product_qnt']>0)
                                <button type="submit" class="btn btn-outline-danger" href="#">
                                    <i class="fa fa-trash" aria-hidden="true" ></i>
                                </button>
                                @else
                                <button type="submit" class="btn btn-outline-secondary" href="#">
                                    <i class="fa fa-trash" aria-hidden="true" ></i>
                                </button>
                                @endif
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
        <div class="card-footer text-muted">
    </div>
</div>
@endsection