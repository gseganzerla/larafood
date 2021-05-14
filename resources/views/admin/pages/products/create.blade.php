@extends('adminlte::page')

@section('title', 'cadastrar Novo Produto')

@section('content_header')
<h1>Cadastar Novo Produto </h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('admin.pages.products._partials.form')
        </form>
    </div>
</div>
@endsection
