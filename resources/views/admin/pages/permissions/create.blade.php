@extends('adminlte::page')

@section('title', 'cadastrar Nova Permissão')

@section('content_header')
<h1>Cadastar Nova Permissão </h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('permissions.store') }}" method="POST">
            @include('admin.pages.permissions._partials.form')
        </form>
    </div>
</div>
@endsection
