@extends('adminlte::page')

@section('title', "Detalhes do detalhe {$plan->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
    <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('details.plan.index', $plan->url) }}">Detalhes</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('details.plan.show', [$plan->url, $detail->id]) }}">Detalhes</a></li>
</ol>

<h1>Detalhes do detalhe{{ $plan->name }}</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <ul>
            <li>
                <strong>Nome: </strong> {{ $detail->name }}
            </li>
        </ul>
        <div class="card-footer">
            <form action="{{ route('details.plan.destroy', [$plan->url, $detail->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar detalhe {{ $detail->name }}, do plano {{ $plan->name }}</button>
            </form>
        </div>
    </div>
</div>
@endsection