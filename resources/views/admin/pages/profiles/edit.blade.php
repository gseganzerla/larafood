@extends('adminlte::page')

@section('title', 'Editar o Perfil')

@section('content_header')
<h1>Editar o Perfil </h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('profiles.update', $profile->id) }}" method="POST">
            @csrf
            @method('PUT')

            @include('admin.pages.profiles._partials.form')
        </form>
    </div>
</div>
@endsection
