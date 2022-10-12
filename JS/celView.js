'use strict'

$(document).ready(function(){
    
    $(window).resize(function(){
        const ancho = $(window).width();
        if(ancho >= 768){
            $('.navBar').css('opacity', '1');
            $('.navBar').css('width', '100%');
            $('.navBar').css('visibility', 'visible');
        }else{
            $('.sidenav').css('visibility', 'hidden');
            $('.sidenav').css('transition', 'visibility 0s, opacity 0.5s linear');
            $('.sidenav').css('opacity', '0');
            $('.sidenav').css('width', 0);
        }
    });


    $('#sideNav').on('click', function(){

    $(document.body).addClass('layer');
    $('.sidenav').css('width', '50%');  
    $('.sidenav').css('visibility', 'visible');
    $('.sidenav').css('transition', 'visibility 0s, opacity 0.5s linear');
    $('.sidenav').css('opacity', '1');
    $('.contenedor, .footer, th, .active, html, body, #sc').addClass('layerEsp');
    $('.mapa, .imgFrame, p, h2, h3, h4, .contenedor3, .contenedor2, .contenedor-header, .c-esp').addClass('fakeLayer');


    });

    $('#closeSideNav').on('click', function(){
        $('.sidenav').css('width', 0);
        $('#sideNav').css('top', 0);
        $('#sideNav').css('right', 0);
        $('.sidenav').css('visibility', 'hidden');
        $('.sidenav').css('transition', 'visibility 0s, opacity 0.5s linear');
        $('.sidenav').css('opacity', '0');



        $(document.body).removeClass('layer');
        $('.contenedor, .footer, th, .active, html, body, #sc').removeClass('layerEsp');
        $('.mapa, .imgFrame, p, h2, h3, h4, .contenedor3, .contenedor2, .contenedor-header, .c-esp').removeClass('fakeLayer');
        
        
    });



});

