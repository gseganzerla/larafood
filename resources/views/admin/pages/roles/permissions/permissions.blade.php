@extends('adminlte::page')

@section('title', "Permissões do perfil {{ $profile->name }}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}">Perfis</a></li>
</ol>

<h1>Permissões do perfil <strong>{{ $profile->name }}</strong> 
    <a href="{{ route('profiles.permissions.avaliable', $profile->id) }}" class="btn btn-dark"><i class="fas fa-plus"></i>
    </a>
</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th width="50px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('profiles.permission.detach', [$profile->id, $permission->id]) }}"
                                    class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
