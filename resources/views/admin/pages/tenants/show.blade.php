@extends('adminlte::page')

@section('title', 'Detalhes da produto')

@section('content_header')
<h1>Detalhes da produto <b>{{ $tenant->name }}</b></h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <img src="{{ url("storage/{$tenant->logo}") }}" alt="{{ $tenant->title }}" style="max-width:90px;">
        <ul>
            <li>
                <strong>Plano</strong> {{ $tenant->plan->name }}
            </li>
            <li>
                <strong>Nome: </strong> {{ $tenant->name }}
            </li>
            <li>
                <strong>Url: </strong> {{ $tenant->url }}
            </li>
            <li>
                <strong>Email: </strong> {{ $tenant->email }}
            </li>
            <li>
                <strong>CNPJ: </strong> {{ $tenant->cnpj }}
            </li>
            <li>
                <strong>Ativo: </strong> {{ $tenant->active ? 'SIM' : 'NÃO' }}
            </li>
        </ul>
        <hr>
        <ul>
            <li>
                <strong>Data Assinatura: </strong> {{ $tenant->subscription }}
            </li>
            <li>
                <strong>Data Expira</strong> {{ $tenant->expires_at }}
            </li>
            <li>
                <strong>Identificador</strong> {{ $tenant->subscription_id }}
            </li>
            <li>
                <strong>Ativo ?</strong> {{ $tenant->subscription_active ? 'SIM' : 'NÃO' }}
            </li>
            <li>
                <strong>Cancelou ?</strong> {{ $tenant->subscription_suspended ?'SIM' : 'NÃO' }}
            </li>
        </ul>

        <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>

        </form>
    </div>
</div>
@endsection
