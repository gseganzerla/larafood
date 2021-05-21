@extends('adminlte::page')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}">Cargos</a></li>
</ol>

<h1>Permissões disponiveis cargo <strong>{{ $role->name }}</strong>
    <a href="{{ route('roles.permissions.avaliable', $role->id) }}"
        class="btn btn-dark"><i class="fas fa-plus"></i>
    </a>
</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{ route('roles.permissions.avaliable', $role->id) }}" method="post" class="form form-inline">
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
                    <th width="50px">#</th>
                    <th>Nome</th>
                    <th width="150px">Ações</th>
                </tr>
            </thead>
            <tbody>
                <form action="{{ route('roles.permissions.attach', $role->id) }}" method="POST">
                    @csrf
                    @foreach($permissions as $permission)
                        <tr>
                            <td><input type="checkbox" name="permissions[]" value="{{ $permission->id }}"></td>
                            <td>{{ $permission->name }}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="500">
                            @include('admin.includes.alerts')
                            <button type="submit" class="btn btn-dark">Vincular</button>
                        </td>
                    </tr>
                </form>
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