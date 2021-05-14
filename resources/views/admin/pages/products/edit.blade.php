@extends('adminlte::page')

@section('title', 'Editar o Produto')

@section('content_header')
<h1>Editar o Produto </h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('admin.pages.products._partials.form')
        </form>
    </div>
</div>
@endsection
