@extends('adminlte::page')

@section('title', 'Editar o Usuario')

@section('content_header')
<h1>Editar o Usuario </h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            @include('admin.pages.users._partials.form')
        </form>
    </div>
</div>
@endsection
