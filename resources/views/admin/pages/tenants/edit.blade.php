@extends('adminlte::page')

@section('title', 'Editar o Tenant')

@section('content_header')
<h1>Editar o Tenant </h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('tenants.update', $tenant->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('admin.pages.tenants._partials.form')
        </form>
    </div>
</div>
@endsection
