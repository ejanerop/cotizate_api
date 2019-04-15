@extends('layouts.app')

@section('content')

    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Inicio</a></li>
            <li class="breadcrumb-item"><a href="">Temas</a></li>
            <li class="breadcrumb-item"><a href="">Crear</a></li>
        </ol>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <tr class="active">
                <th>Usuario</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->roles->name}}</td>
                    <td> <button class="btn-outline-info">Modificar</button> <button class="btn-outline-danger">Eliminar</button> </td>
                </tr>
            @endforeach

        </table>
    </div>

@endsection