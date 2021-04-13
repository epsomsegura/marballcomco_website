lib={
  toasts:function(msg){
    M.toast({
      html:msg,
      classes: 'rounded'
    });
  },
  loader:{
    show:function(){
      $('.preloaderContainer').show();
      $('.preloaderCircleContainer').css({'display':'flex'});
    },
    hide:function(){
      $('.preloaderContainer').hide();
      $('.preloaderCircleContainer').fadeOut(500);
    }
  },
}


$(document).ready(function () {
    M.AutoInit();
    AOS.init();
    lib.loader.hide();
  
    $('#carrusel_clientes').carousel({
      fullWidth: false,
      indicators: true,
      duration: 20,
      numVisible: 3,
    });
    autoplay();
    function autoplay() {
        $('#carrusel_clientes').carousel('next');
        setTimeout(autoplay, 5000);
    }
    mapboxgl.accessToken = 'pk.eyJ1Ijoic2ljYWYiLCJhIjoiY2tlazc1MHR1MW9tbDJyczQ2dWVoZTd4cCJ9.HouuJA-H1lLINchQBDmoew';
    var map = new mapboxgl.Map({
    container: 'map', // container id
    style: 'mapbox://styles/mapbox/streets-v11', // style URL
    center: [-96.925498, 19.565976], // starting position [lng, lat]
    zoom: 15 // starting zoom
    });
    map.scrollZoom.disable();
    map.addControl(new mapboxgl.NavigationControl());
  
    var marker = new mapboxgl.Marker().setLngLat([-96.925498, 19.565976]).addTo(map);
  
    var year = new Date().getFullYear();
    $('#year').html(year);
  });
  
  
  // Scroll FX
  $(window).on('scroll',function (event) {
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    // Do something
    if (scroll >= (windowHeight - 64)) {
      $('.header nav').removeClass('banner_pos');
      $('#menu_options a').removeClass('text-lighten-4').addClass('text-darken-4').addClass('line_fx');
      $('#scrollTopBtn').fadeIn();
    }
    else {
      $('.header nav').addClass('banner_pos');
      $('#menu_options a').removeClass('text-darken-4').removeClass('line_fx').addClass('text-lighten-4');
      $('#scrollTopBtn').fadeOut();
    }
  });
  
  $(document).on('click',
  '#menu_options a[href*="#"],#footer_menu a[href*="#"], #mobile a#line_fx[href*="#"], a#btn_banner_more[href*="#"],a#scrollTopBtn[href*="#"],a#logo_menu[href*="#"],a#arrow_down_banner[href*="#"]',function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
        && location.hostname == this.hostname) {
  
            var $target = $(this.hash);
  
            $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
  
            if ($target.length) {
  
                var targetOffset = $target.offset().top;
  
                $('html,body').animate({scrollTop: targetOffset}, 800);
  
                return false;
  
           }
  
      }
  });