@extends('layouts.app')

@section('content')
    <section class="content-header"></section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header"></div>
            <div class="box-body">
                <table id="income_table" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Dirección IP</th>
                        <th>Nano</th>
                        <th>Nano de acceso</th>
                        <th>Ene</th>
                        <th>Feb</th>
                        <th>Mar</th>
                        <th>Abr</th>
                        <th>May</th>
                        <th>Jun</th>
                        <th>Estado</th>
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
                                <td>{{$income->jan}}</td>
                                <td>{{$income->feb}}</td>
                                <td>{{$income->mar}}</td>
                                <td>{{$income->apr}}</td>
                                <td>{{$income->may}}</td>
                                <td>{{$income->jun}}</td>
                                <td><span class="label {{$income->may == 0?'label-danger':'label-success'}}">{{$income->may == 0?'Atrasado':'Al día'}}</span></td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script>
        $('#income_table').dataTable();
    </script>

@endsection