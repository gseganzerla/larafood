@extends('adminlte::page')

@section('title', 'cadastrar Novo Plano')

@section('content_header')
<h1>Cadastar Novo Plano </h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('plans.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nome:</label>
                <input type="text" class="form-control" name="name" placeholder="Nome:">
            </div>
            <div class="form-group">
                <label>Preço:</label>
                <input type="text" class="form-control" name="price" placeholder="Preço::">
            </div>
            <div class="form-group">
                <label>Descrição:</label>
                <input type="text" class="form-control" name="description" placeholder="Descrição:">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Enviar</button>
            </div>
        </form>
    </div>
</div>
@endsection
