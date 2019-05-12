@extends('layouts.app')

@section('content')

    <section class="content-header"> </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-header"></div>
            <div class="box-body">
                <form>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="username">Usuario:</label>
                            <input id="username" class="form-control input-sm" type="text" name="username" value="{{$user->username}}" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ip_address">Dirección IP:</label>
                            <input id="ip_address" class="form-control input-sm" type="text" name="ip_address" value="{{$user->ip_address}}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="access_nano">Nano de acceso:</label>
                            <input id="access_nano" class="form-control input-sm" type="text" name="access_nano" value="{{$user->access_nano->name}}" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="user_nano">Nano de usuario:</label>
                            <input id="user_nano" class="form-control input-sm" type="text" name="user_nano" value="{{$user->user_nano->name}}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="year">Cotización</label>
                            <select id="year" class="form-control">
                                @foreach($user->incomes as $income)
                                    <option>{{$income->year}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2 pull-right">
                            <label for="total">Total:</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-dollar"></i></div>
                                <input id="total" class="form-control" type="text" value="{{$user->incomes->first()->total}}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Ene</th>
                                    <th>Feb</th>
                                    <th>Mar</th>
                                    <th>Abr</th>
                                    <th>May</th>
                                    <th>Jun</th>
                                    <th>Jul</th>
                                    <th>Ago</th>
                                    <th>Sep</th>
                                    <th>Oct</th>
                                    <th>Nov</th>
                                    <th>Dic</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->incomes as $income)
                                    <tr>
                                        <td>{{$income->jan}}</td>
                                        <td>{{$income->feb}}</td>
                                        <td>{{$income->mar}}</td>
                                        <td>{{$income->apr}}</td>
                                        <td>{{$income->may}}</td>
                                        <td>{{$income->jun}}</td>
                                        <td>{{$income->jul}}</td>
                                        <td>{{$income->ago}}</td>
                                        <td>{{$income->sep}}</td>
                                        <td>{{$income->oct}}</td>
                                        <td>{{$income->nov}}</td>
                                        <td>{{$income->dec}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
