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

            @include('admin.pages.plans._partials.form')
        </form>
    </div>
</div>
@endsection
