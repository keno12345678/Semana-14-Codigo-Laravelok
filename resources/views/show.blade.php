<style>
    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        font-family: Arial, sans-serif;
    }

    .header {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .header img {
        max-width: 100px;
        height: auto;
        margin-right: 20px;
    }

    .header .title {
        font-size: 24px;
        color: #333;
    }

    .content {
        margin-bottom: 20px;
    }

    .meta {
        color: #999;
        font-size: 14px;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .action-button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        text-decoration: none;
        border-radius: 5px;
    }

    .delete-button {
        background-color: #f44336;
    }

    .action-button:hover,
    .delete-button:hover {
        opacity: 0.8;
    }
</style>

@extends('layout')

@section('title', 'Servicio | ' . $servicio->titulo)

@section('content')
<div class="container">
    <div class="header">
        @if($servicio->image)
        <img src="{{ asset('storage/'.$servicio->image) }}" alt="{{ $servicio->titulo }}">
        @endif
        <div class="title">{{ $servicio->titulo }}</div>
    </div>

    <div class="content">
        <p>{{ $servicio->descripcion }}</p>
        <p class="meta">Publicado {{ $servicio->created_at->diffForHumans() }}</p>
    </div>

    @auth
    <div class="action-buttons">
        <a href="{{ route('servicios.edit', $servicio) }}" class="action-button">Editar</a>
        <form action="{{ route('servicios.destroy', $servicio) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button class="action-button delete-button">Eliminar</button>
        </form>
    </div>
    @endauth
</div>
@endsection
