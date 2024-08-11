@extends('layout')

@section('title','Contacto')
@section('content')
<tr>
    <td colspan="4">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" colspan="2">CONTACTO</th>
            </thead>
                @if(session('estado'))
                    {{session('estado')}}
                @else
                <form action="{{route('contacto')}}" method="post">
                @csrf {{--Toquen para verificar que el formulario es seguro--}}
                <tbody>
                    <tr>
                        <td scope="row">Nombre</td>
                        <td>
                            <input type="text" name="nombre" placeholder="Nombre" class="form-control" value="{{old('nombre')}}">
                            {{$errors->first('nombre')}}
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">Email</td>
                        <td>
                            <input type="email" name="email" placeholder="Email" class="form-control" value="{{old('email')}}">
                            {{$errors->first('email')}}
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">Asunto</td>
                        <td>
                            <input type="text" name="asunto" placeholder="Asunto" class="form-control" value="{{old('asunto')}}">
                            {{$errors->first('asunto')}}
                        </td>
                    </tr>
                    <tr>
                        <td scope="row">Mensaje</td>
                        <td>
                            <textarea name="mensaje" cols="15" rows="8" placeholder="Mensaje" class="form-control" value="{{old('mensaje')}}"></textarea>
                            {{$errors->first('mensaje')}}
                        </td>
                    </tr>
                    <tr>
                        <td  scope="row" colspan="2" align="center">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <button type="reset" class="btn btn-primary">Cancelar</button>
                        </td>
                    </tr>
                </tbody>
                </form>
                @endif
        </table>
    </td>
</tr>
@endsection
