@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('store-stock') }}" method="POST">
        @csrf
        <label for="stock_name"></label>
        <input type="text" name="stock_name" id="stock_name">
        <button type="submit">Enviar</button>
    </form>
</div>
@endsection