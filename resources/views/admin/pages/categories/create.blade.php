@extends('adminlte::page')

@section('title', 'cadastrar Nova categoria')

@section('content_header')
<h1>Cadastar Nova Categoria </h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            @include('admin.pages.categories._partials.form')
        </form>
    </div>
</div>
@endsection
