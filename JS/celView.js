'use strict'

$(document).ready(function(){

    // var anchop = $(window).width();
        
    // if(anchop <= 768){
    //     $('#map').attr('width', 450);
    //     $('#map').attr('height', 500);
    // }else{
    //     $('#map').attr('width', 800);
    // }
    
    // $(window).resize(function(){
    //     const ancho = $(window).width();
        
    //     if(ancho <= 768){
    //         $('#map').attr('width', 450);
    //         $('#map').attr('height', 500);
    //     }else{
    //         $('#map').attr('width', 800);
    //         $('#map').attr('height', 600);
    //     }
    // });


    $('#sideNav').on('click', function(){

    $(document.body).addClass('layer');
    $('.sidenav').css('width', '50%');
    $('.contenedor, .footer, th, .active').addClass('layerEsp');
    $('.mapa, .imgFrame, p, h2, h3, h4, .contenedor3, .contenedor2, .contenedor-header, .c-esp').addClass('fakeLayer');


    });

    $('#closeSideNav').on('click', function(){
        $('.sidenav').css('width', 0);
        $('#sideNav').css('top', 0);
        $('#sideNav').css('right', 0);
        $(document.body).removeClass('layer');
        $('.contenedor, .footer, th, .active').removeClass('layerEsp');
        $('.mapa, .imgFrame, p, h2, h3, h4, .contenedor3, .contenedor2, .contenedor-header, .c-esp').removeClass('fakeLayer');
        
        
    });



});

