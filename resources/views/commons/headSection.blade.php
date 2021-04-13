<!-- Metas -->
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="csrf" value="{{ csrf_token() }}">
<!-- Title -->
<title>MarBall Comco | @yield('title')</title>

<!-- Favicon -->
<link rel="icon" type="image/png" href="{{asset('/img/logos/favicon.ico')}}"/>
<link rel="icon" type="image/png" href="{{asset('/img/logos/favicon.png')}}"/>


<link rel="stylesheet" href="{{asset('/assets/css/materialize.min.css')}}"/>
<link rel="stylesheet" href="{{asset('/assets/css/aos.css')}}"/>
<link rel="stylesheet" href="{{asset('/assets/css/all.min.css')}}"/>
<link rel="stylesheet" href="{{asset('/assets/css/cropper.min.css')}}"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.css"/>
<link rel="stylesheet" href="{{asset('/css/marballcomco.css')}}"/>


<script src="{{asset('/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('/assets/js/materialize.min.js')}}"></script>
<script src="{{asset('/assets/js/all.min.js')}}"></script>
<script src="{{asset('/assets/js/cropper.min.js')}}"></script>
<script src="{{asset('/assets/js/aos.js')}}"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.js"></script>
<script src="{{asset('/js/marballcomco.js')}}"></script>