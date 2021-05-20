@extends('adminlte::page')

@section('title', 'cadastrar Novo Tenant')

@section('content_header')
<h1>Cadastar Novo Tenant </h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('tenants.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @include('admin.pages.tenants._partials.form')
        </form>
    </div>
</div>
@endsection
