@extends('adminlte::page')

@section('title', 'Detalhes da produto')

@section('content_header')
<h1>Detalhes da produto <b>{{ $product->name }}</b></h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        @include('admin.includes.alerts')
        <ul>
            <li>
                <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}" style="max-width:90px;">
            </li>
            <li>
                <strong>Titulo: </strong> {{ $product->title }}
            </li>
            <li>
                <strong>Description: </strong> {{ $product->description }}
            </li>
        </ul>

        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>

        </form>
    </div>
</div>
@endsection
