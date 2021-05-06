@extends('adminlte::page')

@section('title', 'cadastrar Novo Perfil')

@section('content_header')
<h1>Cadastar Novo Perfil </h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('profiles.store') }}" method="POST">
            @include('admin.pages.profiles._partials.form')
        </form>
    </div>
</div>
@endsection
