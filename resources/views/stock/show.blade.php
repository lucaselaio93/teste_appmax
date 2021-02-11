@extends('layouts.app')

@section('content')
<style>
.tr-cabecalho{
    background-color: #dee2e6;
}
</style>

<div class="card text-center">
    <div class="card-header">
    <h4>Listagem de estoque</h4>
    </div>
    <div class="card-body">
        <h5 class="card-title"></h5>
        <div class="card-text">
        <table class="table table-striped text-center">
        
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col" style="width:300px">Nome</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            
            
            <tbody>
                @foreach ($arrStock as $stock)
                    <tr>
                        <th scope="row">{{ $stock->stock_id }}</th>
                        <td>{{ $stock->stock_name }}</td>
                        <td class="td-btn">
                            <a class="btn btn-outline-info"" href="{{ route('edit-stock', $stock->stock_id) }}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td class="td-btn">
                            <a class="btn btn-outline-danger"  href="#">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
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