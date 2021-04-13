<!DOCTYPE html>
<html lang="ES">

<head>
    @include('commons/headSection')
</head>

<body>
    <!-- PRELOADERS -->
    <div class="preloaderContainer">
        <div class="progress">
            <div class="indeterminate"></div>
        </div>
    </div>
    <div class="preloaderCircleContainer">
        <div>
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Navbar -->
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper blue darken-1">
                <a href="#!" class="brand-logo right">
                    <img src="{{asset('img/logos/logo_blanco.png')}}" alt="Logo Marball-Comco" style="height: 2.1rem; width: auto;">
                </a>
                <ul class="left hide-on-mid-and-down">
                    <li><a href="#" data-target="slide-out" class="sidenav-trigger" style="display: block !important; color: white !important;"><i class="material-icons">menu</i></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- Sidebar -->
    <ul id="slide-out" class="sidenav">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="{{asset('/img/logos/logo_colores.png')}}" style="width: 100% !important; height:auto; opacity:0.3;" alt="Logo Marball-Comco">
                </div>
                <a href="#user"><img class="circle" src="{{(Auth::user()->photo===null) ? '/img/misc/user.png' : Auth::user()->photo }}"></a>
                <a href="#name"><span class="black-text name">{{Auth::user()->name}}</span></a>
                <a href="#email"><span class="black-text email">{{Auth::user()->email}}</span></a>
            </div>
        </li>
        <li>
            <div class="divider"></div>
        </li>
        @include('commons/dashboardMenu')
    </ul>

    <!-- Contenido -->
    <div class="container">
        @yield('content')
    </div>
    

    @if(sizeOf($errors)>0)
    <script>
        lib.toasts('{{$errors->first()}}');
    </script>
    @endif

    @if(session('success'))
    <script>
        lib.toasts("{{session('success')}}");
    </script>
    @endif

</body>

</html>