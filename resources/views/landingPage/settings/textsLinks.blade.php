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
                <strong class="card-title">Textos y enlaces</strong>
            </div>
        </div>
    </div>
</div>


<!-- Form -->
<div class="row">
    <div class="col s12">
        <ul class="collapsible">
            <li>
                <div class="collapsible-header">
                    Banner
                </div>
                <div class="collapsible-body">
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <textarea name="slogan" id="slogan" class="materialize-textarea" data-length="500" title="Slogan de la empresa">{{$PD->slogan}}</textarea>
                                <label for="slogan">Slogan</label>
                            </div>
                        </div>
                        <div class="col s12">
                            <button type="button" id="btnSubmitBanner" class="right btn waves-effect waves-light blue darken-1" title="Guardar información">Guardar</button>
                        </div>
                    </div>
                </div>
            </li>

            <li>
                <div class="collapsible-header">
                    Identidad empresarial
                </div>
                <div class="collapsible-body">
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <textarea name="aboutUs" id="aboutUs" class="materialize-textarea" data-length="500" title="Acerca de la empresa">{{$PD->aboutUs}}</textarea>
                                <label for="aboutUs">Acerca de</label>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="input-field col s12">
                                <textarea name="mision" id="mision" class="materialize-textarea" data-length="500" title="Misión de la empresa">{{$PD->mision}}</textarea>
                                <label for="mision">Misión</label>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="input-field col s12">
                                <textarea name="vision" id="vision" class="materialize-textarea" data-length="500" title="Visión de la empresa">{{$PD->vision}}</textarea>
                                <label for="vision">Visión</label>
                            </div>
                        </div>
                        <div class="col s12">
                            <button type="button" id="btnSubmitAboutUs" class="right btn waves-effect waves-light blue darken-1" title="Guardar información">Guardar</button>
                        </div>
                    </div>
                </div>
            </li>

            <li>
                <div class="collapsible-header">
                    Productos
                </div>
                <div class="collapsible-body">
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <textarea name="productsTechDesc" id="productsTechDesc" class="materialize-textarea"  data-length="500" title="Descripción de cómputo, video y comnutadores">{{$PD->productsTechDesc}}</textarea>
                                <label for="productsTechDesc">Cómputo, video y conmutadores</label>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="input-field col s12">
                                <textarea name="productsOfficeDesc" id="productsOfficeDesc" class="materialize-textarea"  data-length="500" title="Descripción de productos de equipo, mobiliario y productos de papelería">{{$PD->productsOfficeDesc}}</textarea>
                                <label for="productsOfficeDesc">Equipo, mobiliario y productos de papelería</label>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="input-field col s12">
                                <textarea name="productsBuildDesc" id="productsBuildDesc" class="materialize-textarea"  data-length="500" title="Descripción de productos de materiales para construcción y remodelación">{{$PD->productsBuildDesc}}</textarea>
                                <label for="productsBuildDesc">Materiales para construcción y remodelación</label>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="input-field col s12">
                                <textarea name="productsCleanDesc" id="productsCleanDesc" class="materialize-textarea" data-length="500" title="Descripción de productos de abarrotes y productos de limpieza">{{$PD->productsCleanDesc}}</textarea>
                                <label for="productsCleanDesc">Abarrotes y productos de limpieza</label>
                            </div>
                        </div>
                        <div class="col s12">
                            <button type="button" id="btnSubmitProducts" class="right btn waves-effect waves-light blue darken-1" title="Guardar información">Guardar</button>
                        </div>
                    </div>
                </div>
            </li>

            <li>
                <div class="collapsible-header">
                    Testimonio
                </div>
                <div class="collapsible-body">
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <textarea name="testimonial" id="testimonial"  class="materialize-textarea" data-length="500" title="Testimonio de la empresa">{{$PD->testimonial}}</textarea>
                                <label for="testimonial">Testimonio</label>
                            </div>
                        </div>
                        <div class="col s12">
                            <button type="button" id="btnSubmitTestimonial" class="right btn waves-effect waves-light blue darken-1" title="Guardar información">Guardar</button>
                        </div>
                    </div>
                </div>
            </li>

            <li>
                <div class="collapsible-header">
                    Contacto
                </div>
                <div class="collapsible-body">
                    <div class="row">
                        <div class="col s12">
                            <div class="input-field col s12">
                                <textarea name="address" id="address" class="materialize-textarea" data-length="200" title="Domicilio de la empresa">{{$PD->address}}</textarea>
                                <label for="address">Domicilio</label>
                            </div>
                        </div>
                        <div class="col s12">
                            <br>
                            <h6>Correo electrónico</h6>
                        </div>
                        <div class="col s12">
                            <table id="emailDataRows">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Correo electrónico</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                $strData = str_replace('\'', '"',$PD->emailData);
                                $arrayData = json_decode($strData);
                                $c=1;
                                @endphp
                                @foreach($arrayData as $i)
                                    <tr>
                                        <td>{{$c}}</td>
                                        <td>
                                        <div class="input-field col s12">
                                            <input placeholder="Correo electrónico" id="email_{{$c}}" type="email" class="email validate" value="{{$i->email}}" required title="Correo eelectrónico">
                                            <label for="email_{{$c}}">Correo electrónico</label>
                                        </div>
                                        </td>
                                        <td class="text center">
                                            <a href="#" class="addEmailRow" title="Agregar nuevo correo electrónico"><i class="small material-icons">add_circle_outline</i></a>
                                            <a href="#" class="deleteEmailRow" title="Eliminar correo electrónico"><i class="small material-icons">delete</i></a>
                                        </td>
                                    </tr>
                                @php $c++; @endphp
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col s12">
                            <br>
                            <h6>Redes sociales</h6>
                        </div>
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input type="text" id="FacebookLink" name="FacebookLink" placeholder="Enlace para Facebook" value="{{$PD->FacebookLink}}" class="validate" required title="Liga para Facebook">
                                <label for="FacebookLink">Enlace para Facebook</label>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input type="text" id="TwitterLink" name="TwitterLink" placeholder="Enlace para Twitter" value="{{$PD->TwitterLink}}" class="validate" required title="Liga para Twitter">
                                <label for="TwitterLink">Enlace para Twitter</label>
                            </div>
                        </div>
                        <div class="col s12">
                            <div class="input-field col s12">
                                <input type="text" id="InstagramLink" name="InstagramLink" placeholder="Enlace para Instagram" value="{{$PD->InstagramLink}}" class="validate" required title="Liga para Instagram">
                                <label for="InstagramLink">Enlace para Instagram</label>
                            </div>
                        </div>
                        <div class="col s12">
                            <br>
                            <h6>Contactos desde movil</h6>
                        </div>
                        <div class="col s12 m4">
                            <div class="input-field col s12">
                                <input type="text" id="phonoNumber" name="phonoNumber" placeholder="No. de teléfono" value="{{$PD->phonoNumber}}" class="validate" required title="Número telefónico de la empresa">
                                <label for="phonoNumber">No. de teléfono</label>
                            </div>
                        </div>
                        <div class="col s12 m4">
                            <div class="input-field col s12">
                                <input type="text" id="whatsappNumber" name="whatsappNumber" placeholder="No. para Whatsapp" value="{{$PD->whatsappNumber}}" class="validate" required title="Número telefónico para WhatsApp">
                                <label for="whatsappNumber">No. para Whatsapp</label>
                            </div>
                        </div>
                        <div class="col s12 m4">
                            <div class="input-field col s12">
                                <input type="text" id="telegramNumber" name="telegramNumber" placeholder="No. para Telegram" value="{{$PD->telegramNumber}}" class="validate" required title="Número telefónico para Telegram">
                                <label for="telegramNumber">No. para Telegram</label>
                            </div>
                        </div>
                        <div class="col s12">
                            <button type="button" id="btnSubmitContact" class="right btn waves-effect waves-light blue darken-1" title="Guardar información">Guardar</button>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

<script src="{{asset('js/settings/textLinks.js')}}"></script>

@endsection