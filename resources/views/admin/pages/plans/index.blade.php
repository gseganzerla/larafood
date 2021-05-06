@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}">Planos</a></li>
</ol>

<h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark"><i class="fas fa-plus"></i></a>
</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{ route('plans.search') }}" method="post" class="form form-inline">
            @csrf
            <input type="text" class="form-control" name="filter" planceholder="Nome"
                value="{{ $filters['filter'] ?? '' }}">
            <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th width="150px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($plans as $plan)
                    <tr>
                        <td>{{ $plan->name }}</td>
                        <td>R$
                            {{ number_format($plan->price, 2, ',', '.') }}
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('details.plan.index', $plan->url) }}"
                                    class="btn btn-primary">Detalhes</a>
                                <a href="{{ route('plans.edit', $plan->url) }}"
                                    class="btn btn-info">Editar</a>
                                <a href="{{ route('plans.show', $plan->url) }}"
                                    class="btn btn-warning">Ver</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if(isset($filters))
            {{ $plans->appends($filters)->links() }}
        @else
            {{ $plans->links() }}
        @endif
    </div>
</div>

@endsection
