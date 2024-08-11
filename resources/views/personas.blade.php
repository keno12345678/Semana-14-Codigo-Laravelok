@extends('layout')

@section('content')
    <h2>Personas </h2>
    <tr>
        @if ($personas)
            @foreach ($personas as $persona)
                <td>
                    {{-- <strong>{{$item->id}}</strong><br>
                    <strong>{{$item->titulo}}</strong><br>
                    {{$item->descripcion}} --}}
                    <a href="{{ route('personas.show',$persona->nPerCodigo) }}">{{ $persona->titulo }}</a>
                </td>
            @endforeach
            <tr>
                <td colspan="4">{{$personas->links('pagination::bootstrap-4')}}</td>
            </tr>
        @else
            <td>No existe ningun servicio que mostrar</td>
        @endif
    <tr>

@endsection
