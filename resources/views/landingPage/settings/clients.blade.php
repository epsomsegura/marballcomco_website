@extends('layouts.dashboard')

@section('title','Textos y enlaces')

@section('content')

<input type="hidden" id="id" value="{{$PD->id}}">

@csrf
<!-- Title -->
<div class="row">
    <div class="col s12">
        <div class="card-panel">
            <div class="card-content">
                <strong class="card-title">Clientes</strong>
            </div>
        </div>
    </div>
</div>


<!-- Form -->
<div class="row">
    <div class="col s12">
        <div class="card-panel">
            <div class="card-content">
                <div class="row">
                    <div class="col s12">
                        <a href="#mdl_new" class="waves-effect waves-light btn blue modal-trigger right" title="Registrar nuevo cliente">Nuevo cliente</a>
                    </div>
                    <div class="col s12">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cliente</th>
                                    <th>Logo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($CD as $k=>$v)
                                <tr data-clientName="{{$v->clientName}}" data-clientLogo="{{$v->clientLogo}}">
                                    <td class="center">{{$k+1}}</td>
                                    <td>{{$v->clientName}}</td>
                                    <td class="center">
                                        <img class="imgClientLogoTable" src="{{$v->clientLogo}}" alt="Logo {{$v->clientName}}" title="Logo {{$v->clientName}}">
                                    </td>
                                    <td align="center">
                                        <a href="#" class="waves-effect waves-light btn-flat red-text btn_edit" data-id="{{$v->id}}" title="Editar"><i class="material-icons">edit</i></a>
                                        <a href="#" class="waves-effect waves-light btn-flat blue-text btn_delete" data-id="{{$v->id}}" title="Eliminar"><i class="material-icons">delete_forever</i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div id="mdl_new" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Nuevo cliente</h4>
        <div class="row">
            <!-- Nombre del cliente -->
            <div class="col s12">
                <div class="input-field col s12">
                    <input type="hidden" name="logo" id="logo">
                    <input placeholder="Nombre del cliente" id="clientName" type="text" class="validate" title="Nombre del cliente">
                    <label for="clientName">Nombre del cliente</label>
                </div>
            </div>
            <!-- Logo del cliente - INPUT -->
            <div class="col s12">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Imagen</span>
                        <input type="file" id="fileLogoClient" title="Cargar imagen de logotipo de nuevo cliente">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" title="Ruta del archivo de logotipo de nuevo cliente">
                    </div>
                </div>
            </div>
            <!-- Logo del cliente - CROPPER -->
            <div class="col s12" id="imgCropper" style="display: none;">
                <div>
                    <img id="clientLogo" data-orig-src="" src="">
                </div>
                <div class="col s12 m3">
                    <div class="input-field col s12 center">
                        <button type="button" id="btnAcceptChangePhoto" class="btn waves-effect waves-light green darken-1" title="Seleccionar imagen recortada">Seleccionar</button>
                    </div>
                </div>
                <div class="col s12 m3">
                    <div class="input-field col s12 center">
                        <button type="button" id="btnUndoChangePhoto" class="btn waves-effect waves-light red darken-1" title="Deshacer recorte de imagen">Deshacer</button>
                    </div>
                </div>
            </div>
            <!-- Logo del cliente - PREVIEW -->
            <div class="col s12 center">
                <img src="" alt="" id="logoCropped" title="Imagen recortada">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" id="btnCloseModalClient" class="modal-close waves-effect red btn" title="Cancelar registro de nuevo cliente">Cancelar</a>
        <a href="#!" id="btnSaveModalClient" class="waves-effect blue btn" title="Registrar nuevo cliente en la plataforma">Registrar</a>
    </div>
</div>

<script src="{{asset('js/settings/clients.js')}}"></script>

@endsection