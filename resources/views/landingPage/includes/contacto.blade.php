<div id="contacto">
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12 xl12">
                <h2 class="center" data-aos="flip-up">Contacto</h2>
            </div>
        </div>
    </div>
    <div id="map"></div>
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12 xl12">
                <h4 class="center" data-aos="flip-up">Ubicación</h4>
                <p class="center">
                    {{$PD->address}}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m4 l4 xl4">
                <h5 data-aos="flip-down">Correo electrónico</h5>
                <ul class="contact_list">
                @php
                $strData = str_replace('\'', '"',$PD->emailData);
                $arrayData = json_decode($strData);
                @endphp
                @foreach($arrayData as $i)
                    <li data-aos="zoom-out-up"><span class="fas fa-envelope"></span> {{$i->email}}</li>
                @endforeach
                </ul>
            </div>
            <div class="col s12 m4 l4 xl4">
                <h5 data-aos="flip-down">Redes sociales</h5>
                <ul class="contact_list">
                    <li class="lnkRS" data-aos="zoom-out-up" data-href="{{$PD->FacebookLink}}"><span class="fab fa-facebook-square"></span> Facebook</li>
                    <li class="lnkRS" data-aos="zoom-out-up" data-href="{{$PD->TwitterLink}}"><span class="fab fa-twitter-square"></span> Twitter</li>
                    <li class="lnkRS" data-aos="zoom-out-up" data-href="{{$PD->InstagramLink}}"><span class="fab fa-instagram-square"></span> Instagram</li>
                </ul>
            </div>
            <div class="col s12 m4 l4 xl4">
                <h5 data-aos="flip-down">Teléfono</h5>
                <ul class="contact_list">
                    <li data-aos="zoom-out-up"><span class="fas fa-phone-alt"></span> Teléfono</li>
                    <li data-aos="zoom-out-up"><span class="fab fa-whatsapp"></span> WhatsApp</li>
                    <li data-aos="zoom-out-up"><span class="fab fa-telegram"></span> Telegram</li>
                </ul>
            </div>
        </div>
        <br>
        <br>
    </div>
</div>