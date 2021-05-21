@extends('adminlte::page')

@section('title', 'Cadastrar novo cargo')

@section('content_header')
<h1>Cadastrar novo cargo </h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('roles.store') }}" method="POST">
            @include('admin.pages.roles._partials.form')
        </form>
    </div>
</div>
@endsection
