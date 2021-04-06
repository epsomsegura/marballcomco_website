<div class="row" id="productos">
    <div class="col s12 m12 l12 xl12">
        <h2 class="center" data-aos="flip-up">Productos</h2>
    </div>
    <div class="col s12 m6 l6 xl6">
        <div class="card" data-aos="zoom-in-up">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="{{asset('img/productos/computo.jpg')}}" alt="">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Cómputo, video y conmutadores<i class="material-icons right">more_vert</i></span>
                <p class="justify"><a href="#">Ver más</a></p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Cómputo, video y conmutadores<i class="material-icons right">close</i></span>
                <p align="justify">{{$PD->productsTechDesc}}</p>
            </div>
        </div>
    </div>
    <div class="col s12 m6 l6 xl6">
        <div class="card" data-aos="zoom-in-up">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="{{asset('img/productos/papeleria.jpg')}}" alt="">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Equipo, mobiliario y productos de papelería<i class="material-icons right">more_vert</i></span>
                <p class="justify"><a href="#">Ver más</a></p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Equipo, mobiliario y productos de papelería<i class="material-icons right">close</i></span>
                <p align="justify">{{$PD->productsOfficeDesc}}</p>
            </div>
        </div>
    </div>
    <div class="col s12 m6 l6 xl6">
        <div class="card" data-aos="zoom-in-up">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="{{asset('img/productos/construccion.jpg')}}" alt="">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Materiales para construcción y remodelación<i class="material-icons right">more_vert</i></span>
                <p class="justify"><a href="#">Ver más</a></p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Materiales para construcción y remodelación<i class="material-icons right">close</i></span>
                <p align="justify">{{$PD->productsBuildDesc}}</p>
            </div>
        </div>
    </div>
    <div class="col s12 m6 l6 xl6">
        <div class="card" data-aos="zoom-in-up">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="{{asset('img/productos/abarrotes.jpg')}}" alt="">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Abarrotes y productos de limpieza<i class="material-icons right">more_vert</i></span>
                <p class="justify"><a href="#">Ver más</a></p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Abarrotes y productos de limpieza<i class="material-icons right">close</i></span>
                <p align="justify">{{$PD->productsCleanDesc}}</p>
            </div>
        </div>
    </div>
</div>