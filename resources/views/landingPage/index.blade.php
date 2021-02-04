@extends('layouts/landing')

@section('title','Inicio')

@section('content')

<!-- Cabecera -->
@include('landingPage.includes.header')

<!-- Banner -->
@include('landingPage.includes.banner')
<div class="container">
    <!-- Nosotros -->
    @include('landingPage.includes.nosotros')
</div>
<!-- Paralax -->
<div class="parallax_container" id="parallax1"></div>
<div class="container">
    <!-- Productos -->
    @include('landingPage.includes.productos')
</div>
<!-- Paralax -->
<div class="parallax_container" id="parallax2"></div>
<div class="container">
    <!-- Clientes -->
    @include('landingPage.includes.clientes')
</div>
<!-- Paralax -->
<div class="parallax_container" id="parallax3"></div>

<!-- Mapa -->
@include('landingPage.includes.contacto')

<!-- Footer -->
@include('landingPage.includes.footer')

<!-- Scroll Up -->
<a href="/#banner" id="scrollTopBtn" class="btn-floating btn-large waves-effect waves-light grey darken-4" title="Go to top"><i class="material-icons">arrow_upward</i></a>


@endsection