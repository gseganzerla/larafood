@extends('adminlte::page')

@section('title', 'cadastrar Nova Mesas')

@section('content_header')
<h1>Cadastar Nova Mesas </h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('tables.store') }}" method="POST">
            @csrf

            @include('admin.pages.tables._partials.form')
        </form>
    </div>
</div>
@endsection
