@extends('layouts.app')

@section('content')

    <div class="container">
        <table class="table table-bordered">
            <tr class="active">
                <th>Tema de investigación</th>
                <th>Descripción</th>
                <th>Cantidad de documentos</th>
                <th>Acciones</th>
            </tr>
            <tr>
                <td>Lucha Revolucionaria</td>
                <td>Lorem ipsum dolor sit...</td>
                <td>15</td>
                <td> <button class="btn-outline-info">Modificar</button> <button class="btn-outline-danger">Eliminar</button> </td>
            </tr>

        </table>
    </div>

@endsection