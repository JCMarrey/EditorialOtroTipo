'use strict'

$(document).ready(function(){
    var anchop = $(window).width();


    if(anchop <= 960){
        swiper = new Swiper(".mySwiper", {
            slidesPerView: 2,
            spaceBetween: 15,
            slidesPerGroup: 2,
            loop: false,
            loopFillGroupWithBlank: true,
            pagination: {
            el: ".swiper-pagination",
            clickable: true,
            },
            navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
            },
        });
    }

    if(anchop > 960 && anchop <= 1200){
        swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            slidesPerGroup: 3,
            loop: false,
            loopFillGroupWithBlank: true,
            pagination: {
            el: ".swiper-pagination",
            clickable: true,
            },
            navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
            },
        });
    }

    if(anchop >= 1200){
        swiper = new Swiper(".mySwiper", {
            slidesPerView: 4,
            spaceBetween: 30,
            slidesPerGroup: 4,
            loop: false,
            loopFillGroupWithBlank: true,
            pagination: {
            el: ".swiper-pagination",
            clickable: true,
            },
            navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
            },
        });
    }

    if(anchop <= 650){
        swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 0,
            slidesPerGroup: 1,
            loop: false,
            loopFillGroupWithBlank: true,
            pagination: {
            el: ".swiper-pagination",
            clickable: true,
            },
            navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
            },
        });
    }

    $(window).resize(function(){
        const ancho = $(window).width();
        if(ancho >= 1200){
            swiper = new Swiper(".mySwiper", {
                slidesPerView: 4,
                spaceBetween: 30,
                slidesPerGroup: 4,
                loop: false,
                loopFillGroupWithBlank: true,
                pagination: {
                el: ".swiper-pagination",
                clickable: true,
                },
                navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
                },
            });
        }else if(ancho > 960 && ancho <= 1200){
            swiper = new Swiper(".mySwiper", {
                slidesPerView: 3,
                spaceBetween: 30,
                slidesPerGroup: 3,
                loop: false,
                loopFillGroupWithBlank: true,
                pagination: {
                el: ".swiper-pagination",
                clickable: true,
                },
                navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
                },
            });
        }else if(ancho > 650 && ancho <= 960){
            swiper = new Swiper(".mySwiper", {
                slidesPerView: 2,
                spaceBetween: 15,
                slidesPerGroup: 2,
                loop: false,
                loopFillGroupWithBlank: true,
                pagination: {
                el: ".swiper-pagination",
                clickable: true,
                },
                navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
                },
            });
            
        }if(ancho <= 650){
            swiper = new Swiper(".mySwiper", {
                slidesPerView: 1,
                spaceBetween: 30,
                slidesPerGroup: 1,
                loop: false,
                loopFillGroupWithBlank: true,
                pagination: {
                el: ".swiper-pagination",
                clickable: true,
                },
                navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
                },
            });
        }
    });

});