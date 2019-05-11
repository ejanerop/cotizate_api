@extends('layouts.app')

@section('content')

    <section class="content-header">
        <div class="container">
            <h2>Nuevo usuario</h2>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12 form-box" >
                <div class="box box-primary width-auto">
                    <div class="box-header"></div>
                    <form id="user" role="form" method="POST" action="{{route('user.store')}}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon glyphicon glyphicon-user"></span>
                                    <input id="username" type="text" class="form-control" name="username" placeholder="Usuario" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon glyphicon glyphicon-lock"></span>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon glyphicon glyphicon-log-in"></span>
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Repetir contraseña" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-wifi"></i> </span>
                                    <select id="access_nano" name="access_nano" class="form-control">
                                        @foreach($access_nanos as $nano)
                                            <option id="{{$nano->id}}">{{$nano->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-wifi"></i></span>
                                    <select id="$user_nanos" name="$user_nanos" class="form-control">
                                        @foreach($user_nanos as $nano)
                                            <option id="{{$nano->id}}">{{$nano->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><strong>Rol</strong></span>
                                    <select id="role" name="role" class="form-control">
                                            @foreach($roles as $role)
                                                <option id="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="reset" class="btn btn-warning btn-flat pull-left">
                                    <span class="glyphicon glyphicon-erase"></span>
                                    {{ __('Limpiar') }}
                                </button>
                                <button type="submit" class="btn btn-primary btn-flat pull-right">
                                    <span class="glyphicon glyphicon-plus"></span>
                                    {{ __('Crear') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        $('li.li').removeClass('active');
        $('li#user').addClass('active');
        $('li#userCreate').addClass('active');
        $('#user').validate({
            rules: {
                username: {
                    required: true,
                    minlength: 3,
                    maxlength: 255
                },
                password: {
                    required: true,
                    minlength: 8
                },
                password_confirm: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                username: {
                    required: "Escribe un nombre de usuario",
                    minlength: "El usuario debe tener al menos 3 caracteres",
                    maxlength: "Detente"
                },
                password: {
                    required: "Escribe una contraseña",
                    minlength: "Tu contraseña debe tener al menos 8 caracteres"
                },
                confirm_password: {
                    required: "Escribe una contraseña",
                    minlength: "Tu contraseña debe tener al menos 8 caracteres",
                    equalTo: "Las contraseñas no coinciden"
                },
                email: "Escribe una dirección de correo válida"
            }
        });
    </script>

@endsection
