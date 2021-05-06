@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark">Add</a></h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            filtros
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th width="50px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>{{ $plan->name }}</td>
                            <td>R$ {{ number_format($plan->price, 2, ',', '.') }}</td>
                            <td style="width=50px;"><a href="{{ route('plans.show', $plan->url) }}" class="btn btn-warning">Ver</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $plans->links() }}
        </div>
    </div>

@endsection