@extends('layouts.dashboard')

@section('title','Mi perfil')

@section('content')

<!-- Title -->
<div class="row">
    <div class="col s12">
        <div class="card-panel">
            <div class="card-content">
                <strong class="card-title">Mi perfil</strong>
            </div>
        </div>
    </div>
</div>
<!-- Form -->
<div class="row">
    <div class="col s12">
        <div class="card-panel">
            <div class="card-content">
                <form id="frmMyProfile" action="{{url('/user/myProfile')}}" method="POST">
                    @csrf
                    <input type="hidden" name="photo" id="photo">
                    <div class="row">
                        <div class="col s12">
                            <div>
                                <div>
                                    <img id="userPhoto" data-orig-src="{{Auth::user()->photo===null ? '/img/misc/user.png' : Auth::user()->photo}}" src="{{Auth::user()->photo===null ? '/img/misc/user.png' : Auth::user()->photo}}">
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="file-field input-field">
                                <div class="btn blue darken-1">
                                    <span>Cargar imagen</span>
                                    <input type="file" id="fileUserPhoto">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m3">
                            <div class="input-field col s12 center">
                                <button type="button" id="btnAcceptChangePhoto" class="btn waves-effect waves-light green darken-1">Cambiar</button>
                            </div>
                        </div>
                        <div class="col s12 m3">
                            <div class="input-field col s12 center">
                                <button type="button" id="btnUndoChangePhoto" class="btn waves-effect waves-light red darken-1">Deshacer</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6 l4">
                            <div class="input-field col s12">
                                <input id="name" name="name" type="text" value="{{$user->name}}" class="validate" required>
                                <label for="name">Nombre completo</label>
                            </div>
                        </div>
                        <div class="col s12 m6 l4">
                            <div class="input-field col s12">
                                <input id="nickname" name="nickname" type="text" value="{{$user->nickname}}" class="validate" required>
                                <label for="nickname">Nombre de usuario</label>
                            </div>
                        </div>
                        <div class="col s12 m6 l4">
                            <div class="input-field col s12">
                                <input id="email" name="email" type="email" value="{{$user->email}}" class="validate" required>
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="col s12 m6 l4">
                            <div class="input-field col s12">
                                <select id="role_id" name="role_id" required>
                                    <option value="0" disabled>Seleccione una opción</option>
                                    @foreach($roles as $r)
                                    <option value="{{$r->id}}" {{($user->role_id === $r->id) ? 'selected': ''}}>{{$r->role}}</option>
                                    @endforeach
                                </select>
                                <label for="role_id">Tipo de usuario</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <label for="chkPassword">Cambiar contraseña: </label>
                            <div class="switch">
                                <label>
                                    No
                                    <input id="chkPassword" type="checkbox">
                                    <span class="lever"></span>
                                    Si
                                </label>
                            </div>
                        </div>
                    </div>
                    <div id="passSection" class="row">
                        <div class="col s12 m6 l4">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate">
                                <label for="password">Nueva contraseña</label>
                            </div>
                        </div>
                        <div class="col s12 m6 l4">
                            <div class="input-field col s12">
                                <input id="password2" type="password" class="validate">
                                <label for="password2">Repita la nueva contraseña</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <button type="button" id="btnSubmit" class="right btn waves-effect waves-light blue darken-1">Actualizar</button>
                            <input type="submit" id="submit" hidden/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('/js/user/myProfile.js')}}"></script>

@endsection