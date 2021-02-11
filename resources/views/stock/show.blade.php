@extends('layouts.app')

@section('content')
<style>
.icon-btn{
    background-color: blue;
    padding: 3px 3px 3px 3px;
    border-radius: 10px;
    border-bottom: 2px black solid;
    border-right: 2px black solid;
}
.remove{
    background-color: red;
}
.td-btn{
    width: 30px;
}
.container{
    margin-left: 23%;
}
.table-border{
    border: 1px #dee2e6 solid;
}
</style>
<div class="container">
    <div class="row">
        <div class="table-border">
            <table class="table table-responsive text-center">
                <tr  ><td colspan="4"> Listagem de Estoque</td></tr>
                <tr>
                    <td>Id</td>
                    <td style="width:300px">Nome</td>
                    <td>Editar</td>
                    <td>Excluir</td>
                </tr>
            
                @foreach ($arrStock as $stock)
                    <tr>
                        <td>{{ $stock->stock_id }}</td>
                        <td>{{ $stock->stock_name }}</td>
                        <td class="td-btn">
                            <a href="{{ route('edit-stock', $stock->stock_id) }}">
                            <div class="icon-btn">
                                <i style="color:white;" class="fa fa-pencil" aria-hidden="true"></i>
                            </div>
                            </a>
                        </td>
                        <td class="td-btn">
                            <a href="#">
                                <div class="icon-btn remove">
                                    <i style="color:white;" class="fa fa-trash" aria-hidden="true"></i>
                                </div>
                            </a>
                        </td>
                        
                    </tr>
                @endforeach
                
            </table>
        </div>
    </div>
</div>
@endsection