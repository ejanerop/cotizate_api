@extends('layouts.template')

@section('header')

    <header class="main-header">

        <a class="logo" href="{{ url('/') }}">
            <span class="logo-mini">Cot</span>
            <span class="logo-lg">{{ config('app.name', 'Laravel') }}</span>
        </a>

        <nav class="navbar navbar-static-top" role="navigation" style="max-height: 50px">

            <!-- Sidebar toggle button-->
            <ul class="nav navbar-nav pull-left">
                <li>
                    <a href="#" data-toggle="offcanvas" role="button" onclick="toggleToggler()">
                        <span id="toggle" class="glyphicon glyphicon-chevron-left" style="color: #ffffff"></span>
                    </a>
                </li>
            </ul>

            <div class="navbar-custom-menu">

                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        @guest
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Inicio de sesión
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                                @if (Route::has('register'))
                                    <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </div>

                        @else
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }}  <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="user-header">
                                    <img src="/user.png" class="img-circle" alt="User Image">
                                    <p>
                                        {{Auth::user()->username}}
                                        <small>{{\App\User::where('username', Auth::user()->username)->first()->roles->name}}</small>
                                    </p>
                                </li>
                                <li class="user-body"></li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a class="btn btn-default btn-flat" href="/profile/{{Auth::user()->id}}">
                                            {{ __('Pefil') }}
                                        </a>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar sesión') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        @endguest
                    </li>
                </ul>
            </div>

        </nav>

    </header>

    <script id="toggler">
        function toggleToggler() {
            if( $('span#toggle').hasClass('glyphicon-chevron-left')){
                $('span#toggle').removeClass('glyphicon-chevron-left').addClass('glyphicon-chevron-right');
            }else {
                $('span#toggle').removeClass('glyphicon-chevron-right').addClass('glyphicon-chevron-left');
            }
        }
    </script>

@endsection

@section('sidebar')

    <aside class="main-sidebar">
        <!-- Inner sidebar -->
        <section class="sidebar">
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li id="start" class="li active"><a href="/home"><span>Inicio</span><span class="glyphicon glyphicon-home pull-right"></span></a></li>

                <li class="header">Administración</li>
                <li id="user" class="li treeview">
                    <a href="#"><span>Usuarios</span><span class="glyphicon glyphicon-user pull-right"></span></a>
                    <ul class="treeview-menu">
                        <li id="userCreate"><a href="{{route('user.create')}}">Nuevo Usuario <span class="glyphicon glyphicon-plus pull-right"></span></a></li>
                        <li id="userList"><a href="{{route('user.index')}}">Lista de usuarios <span class="glyphicon glyphicon-list pull-right"></span></a></li>
                    </ul>
                </li>
                <li id="user" class="li treeview">
                    <a href="#"><span>Nanos</span><span class="glyphicon glyphicon-magnet pull-right"></span></a>
                       <ul class="treeview-menu">
                            <li id="userCreate"><a href="{{route('user_nano.create')}}">Nuevo Nano<span class="glyphicon glyphicon-plus pull-right"></span></a></li>
                            <li id="userList"><a href="{{route('user_nano.index')}}">Lista de Nanos<span class="glyphicon glyphicon-list pull-right"></span></a></li>
                       </ul>
                </li>
            </ul><!-- /.sidebar-menu -->

        </section><!-- /.sidebar -->
    </aside>

@endsection
