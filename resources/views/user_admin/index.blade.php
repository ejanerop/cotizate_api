@extends('layouts.app')

@section('content')
        <div class="box box-primary">
            <div class="box-header">
                <a href="{{route('user.create')}}" class="btn btn-flat btn-success pull-right"><span class="glyphicon glyphicon-plus"></span>Nuevo</a>
            </div>
            <div class="box-body">
                <table id="income_table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Dirección IP</th>
                            <th>Nano</th>
                            <th>Nano de acceso</th>
                            <th>Abr</th>
                            <th>May</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->username}}</td>
                            <td>{{$user->ip_address}}</td>
                            <td>{{$user->user_nano->name}}</td>
                            <td>{{$user->access_nano->name}}</td>
                            @foreach($user->incomes as $income)
                                <td>{{$income->apr}}</td>
                                <td>{{$income->may}}</td>
                                <td><span class="label {{$income->may == 0?'label-danger':'label-success'}}">{{$income->may == 0?'Atrasado':'Al día'}}</span></td>
                            @endforeach
                            <td>
                            <form action="{{route('user_admin.destroy', ['id' => $user->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('user_admin.show', ['user' => $user->id])}}" class="btn btn-xs btn-success"><span class="fa fa-eye" style="margin-right: 2px"></span> Mostrar</a>
                                <a href="{{route('user_admin.edit', ['user' => $user->id])}}" class="btn btn-xs btn-primary"><span class="fa fa-edit" style="margin-right: 2px"></span> Editar</a>
                                <button type="submit" class="btn btn-xs btn-danger"><span class="fa fa-remove" style="margin-right: 2px"></span> Eliminar</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    <script>
        $('#income_table').dataTable();
    </script>

@endsection