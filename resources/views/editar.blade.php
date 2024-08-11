@extends('layout')

@section('title','Editar Servicio')

@section('content')
<table cellpadding='3' cellspaceing='5'>
<tr>
    @auth
    <th colspan="4">Editar Servicio</th>
    @endauth
</tr>
@include('partials.validation-errors')
<form action="{{ route('servicios.update', $servicio) }}" method="post" enctype="multipart/form-data">
@method('PATCH')
@include('partials.form',['btnText' => 'Actualizar'])
</form>
</table>
@endsection
