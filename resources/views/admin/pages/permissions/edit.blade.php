@extends('adminlte::page')
@section('title', 'Editar a Permissão')

@section('content_header')
<h1>Editar a Permissão </h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
            @method('PUT')
            @include('admin.pages.permissions._partials.form')
        </form>
    </div>
</div>
@endsection
