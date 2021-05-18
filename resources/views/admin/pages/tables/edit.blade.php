@extends('adminlte::page')

@section('title', 'Editar a Mesa')

@section('content_header')
<h1>Editar a Mesa </h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('tables.update', $table->id) }}" method="POST">
            @csrf
            @method('PUT')

            @include('admin.pages.tables._partials.form')
        </form>
    </div>
</div>
@endsection
