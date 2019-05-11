@extends('layouts.app')

@section('content')
    <section class="content-header"></section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header"></div>
            <div class="box-body">
                <table id="nanos_table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Dirección IP</th>
                            <th>Modelo</th>
                            <th>Usuarios conectados</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

            @foreach($userNanos as $nano)
                <tr>
                    <td>{{$nano->name}}</td>
                    <td>{{$nano->ip_address}}</td>
                    <td>{{$nano->model}}</td>
                    <td>{{$nano->users_count}}</td>
                    <td> <button class="btn btn-xs btn-info">Modificar</button> <button class="btn btn-xs btn-danger">Eliminar</button></td>
                </tr>
            @endforeach

        </table>
            </div>
        </div>
    </section>
    </div>
    <script>
        $('#nanos_table').dataTable();
    </script>

@endsection