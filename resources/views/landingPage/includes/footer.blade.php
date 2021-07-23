<div class="container-fuid" id="footer">
    <div class="row">
        <div class="col s12 m4 l4 xl4">
            <small>
                <h5>Mapa del sitio</h5>
                <ul class="footer_menu">
                    <li><a class="line_fx" href="/#nosotros">Nosotros</a></li>
                    <li><a class="line_fx" href="/#productos">Productos</a></li>
                    <li><a class="line_fx" href="/#clientes">Clientes</a></li>
                    <li><a class="line_fx" href="/#contacto">Contacto</a></li>
                </ul>
            </small>
        </div>
        <div class="col s12 m4 l4 xl4">
            <small>
                <h5>Productos</h5>
                <ul class="footer_menu">
                    <li><a href="/#productos">Cómputo, video y conmutadores</a></li>
                    <li><a href="/#productos">Equipo, mobiliario y productos de papelería</a></li>
                    <li><a href="/#productos">Materiales para construcción y remodelación</a></li>
                    <li><a href="/#productos">Abarrotes y productos de limpieza</a></li>
                </ul>
            </small>
        </div>
        <div class="col s12 m4 l4 xl4">
            <small>
                <h5>Mar-Ball Comco</h5>
                <ul class="footer_menu">
                    <li>{{$PD->address}}</li>
                    @if($PD->phonoNumber !== NULL) <li>Teléfono: {{$PD->phonoNumber}}</li> @endif
                    @if($PD->whatsappNumber !== NULL) <li>Whatsapp: {{$PD->whatsappNumber}}</li> @endif
                    @if($PD->telegramNumber !== NULL) <li>Telegram: {{$PD->telegramNumber}}</li> @endif

                    @php
                    $strData = str_replace('\'', '"',$PD->emailData);
                    $arrayData = json_decode($strData);
                    $c=1;
                    @endphp


                    @foreach($arrayData as $i)
                    <li>
                        <a style="color: #868d93 !important;" href="mailto:{{$i->email}}">Email {{$c}}: {{$i->email}}</a>
                    </li>
                    @php $c++; @endphp
                    @endforeach
                </ul>
            </small>
        </div>
        <div class="col s12 m12 l12 xl12">
            <div class="contact_bar center">
                <a href="{{($PD->FacebookLink == NULL) ? '' : $PD->FacebookLink }}" class="footer_rs">
                    <span class="fab fa-facebook"></span>
                </a>
                <a href="{{($PD->InstagramLink == NULL) ? '' : $PD->InstagramLink }}" class="footer_rs">
                    <span class="fab fa-instagram"></span>
                </a>
                <a href="{{($PD->TwitterLink == NULL) ? '' : $PD->TwitterLink }}" class="footer_rs">
                    <span class="fab fa-twitter"></span>
                </a>
            </div>
        </div>
        <div class="col s12 m12 l12 xl12 center">
            <a id="bannerLink" href="/#banner" style="color: #868d93 !important;">
                <small>MARBALL COMCO &copy; <span id="year"></span></small>
            </a>
        </div>
    </div>
</div>