@extends('adminlte::page')

@section('title', 'Detalhes da Mesa')

@section('content_header')
<h1>Detalhes da Mesa <b>{{ $table->name }}</b></h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @include('admin.includes.alerts')
        <ul>
            <li>
                <strong>Identificador: </strong> {{ $table->identify }}
            </li>
            <li>
                <strong>Description: </strong> {{ $table->description }}
            </li>
        </ul>

        <form action="{{ route('tables.destroy', $table->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>

        </form>
    </div>
</div>
@endsection
