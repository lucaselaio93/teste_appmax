@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('update-stock', $stock->stock_id) }}" method="POST">
        @csrf
        <label for="stock_name"></label>
        <input type="text" name="stock_name" id="stock_name" value="{{$stock->stock_name}}">
        <button type="submit">Enviar</button>
    </form>
</div>
@endsection