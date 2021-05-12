@extends('adminlte::page')

@section('title', 'cadastrar Novo Usuario')

@section('content_header')
<h1>Cadastar Novo Usuario </h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            @include('admin.pages.users._partials.form')
        </form>
    </div>
</div>
@endsection
