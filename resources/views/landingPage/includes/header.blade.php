<!-- REGION: GLOBAL VARS -->
<input type="hidden" id="lat" value="{{$PD->lat}}">
<input type="hidden" id="lng" value="{{$PD->lng}}">
<!-- ENDREGION: GLOBAL VARS -->
<div class="header navbar-fixed">
    <nav class="grey lighten-5 banner_pos">
        <div class="nav-wrapper">
            <a href="/#banner" id="logo_menu" class="grey-text text-lighten-4 brand-logo">
                <img src="{{asset('img/logos/logo_colores.png')}}" alt="Logo Marball-Comco">
            </a>
            <a href="#" data-target="mobile" class="sidenav-trigger"><i class="fas fa-bars"></i></a>
            <ul id="menu_options" class="right hide-on-med-and-down">
                <li><a class="grey-text text-lighten-4" href="/#nosotros">Nosotros</a></li>
                <li><a class="grey-text text-lighten-4" href="/#productos">Productos</a></li>
                <li><a class="grey-text text-lighten-4" href="/#clientes">Clientes</a></li>
                <li><a class="grey-text text-lighten-4" href="/#contacto">Contacto</a></li>
                <li><a class="grey-text text-lighten-4" href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a class="grey-text text-lighten-4" href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a class="grey-text text-lighten-4" href="#"><i class="fab fa-twitter"></i></a></li>
            </ul>
            <ul class="sidenav grey darken-4" id="mobile">
                <li><a class="grey-text text-lighten-4 line_fx" href="/#nosotros">Nosotros</a></li>
                <li><a class="grey-text text-lighten-4 line_fx" href="/#productos">Productos</a></li>
                <li><a class="grey-text text-lighten-4 line_fx" href="/#clientes">Clientes</a></li>
                <li><a class="grey-text text-lighten-4 line_fx" href="/#contacto">Contacto</a></li>
                <li><a class="grey-text text-lighten-4" href="{{($PD->FacebookLink == NULL) ? '#': $PD->FacebookLink }}"><i class="fab fa-facebook"></i> Facebook</a></li>
                <li><a class="grey-text text-lighten-4" href="{{($PD->TwitterLink == NULL) ? '#': $PD->TwitterLink }}"><i class="fab fa-instagram"></i> Instagram</a></li>
                <li><a class="grey-text text-lighten-4" href="{{($PD->InstagramLink == NULL) ? '#': $PD->InstagramLink }}"><i class="fab fa-twitter"></i> Twitter</a></li>
              </ul>
        </div>
    </nav>
</div>