@extends('adminlte::page')

@section('title', 'Detalhes do Usuario')

@section('content_header')
<h1>Detalhes do Usuario <b>{{ $user->name }}</b></h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @include('admin.includes.alerts')
        <ul>
            <li>
                <strong>Nome: </strong> {{ $user->name }}
            </li>
            <li>
                <strong>Email: </strong> {{ $user->email }}
            </li>
            <li>
                <strong>Empresa: </strong> {{ $user->tenant->name }}
            </li>
        </ul>

        <form action="{{ route('users.destroy', $user->url) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>

        </form>
    </div>
</div>
@endsection
