@extends('adminlte::page')
@section('title', 'Editar o Cargo {{ $role->name }}')

@section('content_header')
<h1>Editar o Cargo  </h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @method('PUT')
            @include('admin.pages.roles._partials.form')
        </form>
    </div>
</div>
@endsection
