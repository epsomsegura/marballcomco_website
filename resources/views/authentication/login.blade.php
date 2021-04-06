@extends('layouts/clean')

@section('title','Login')

@section('content')

<div class="loginContainer">
    <div class="loginCenter">
        <div class="loginForm z-depth-4">
            <form action="{{url('login')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col s12 center loginLogoContainer">
                        <img src="{{asset('img/logos/logo_colores.png')}}" alt="Logo Marball-Comco">
                    </div>
                    @if(sizeOf($errors)>0)
                    <div class="col s12 center">
                        <small class="red-text darken-1">{{$errors->first()}}</small>
                    </div>
                    @endif
                    <div class="col s12">
                        <div class="input-field col s12">
                            <input placeholder="Email" id="email" name="email" type="email" class="validate" title="Usuario" required>
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="input-field col s12">
                            <input placeholder="Contraseña" id="password" name="password" type="password" class="validate" title="Contraseña" required>
                            <label for="password">Contraseña</label>
                        </div>
                    </div>
                    <div class="col s12">
                        <div class="input-field col s12">
                            <button type="submit" class="btn waves-effect waves-light blue darken-3" style="width: 100% !important;">Iniciar sesión</button>
                        </div>
                    </div>
                    <div class="col s12 m6">
                        <div class="text center">
                            <small><a href="#">Recuperar contraseña</a></small>
                        </div>
                    </div>
                    <div class="col s12 m6">
                        <div class="text center">
                            <small><a href="/">Volver al sitio web</a></small>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection