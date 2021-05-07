@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}">Permissões</a></li>
</ol>

<h1>Permissões <a href="{{ route('permissions.create') }}" class="btn btn-dark"><i class="fas fa-plus"></i></a>
</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{ route('permissions.search') }}" method="post" class="form form-inline">
            @csrf
            <input type="text" class="form-control" name="filter" planceholder="Filtro"
                value="{{ $filters['filter'] ?? '' }}">
            <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th width="150px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                {{-- <a href="{{ route('details.permission.index', $permission->url) }}"
                                    class="btn btn-primary">Detalhes</a> --}}
                                <a href="{{ route('permissions.edit', $permission->id) }}"
                                    class="btn btn-info">Editar</a>
                                <a href="{{ route('permissions.show', $permission->id) }}"
                                    class="btn btn-warning">Ver</a>
                                    <a href="{{ route('permission.profiles', $permission->id) }}"
                                        class="btn btn-warning"><i class="fas fa-address-book"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if(isset($filters))
            {{ $permissions->appends($filters)->links() }}
        @else
            {{ $permissions->links() }}
        @endif
    </div>
</div>

@endsection
