$().ready(() => {
    'use strict'

    /* Show and Hide mobile menu*/
    const burger = $('.burger');
    const burgerMenu = $('.burger-menu');
    const mobileMenu = $('.mobile-menu');
    const closeMenu = $('.close-menu');


    burger.mouseenter(() => {
        let lineas = $('.linea');
        for (let i = 0; i < lineas.length; i++) {
            lineas[i].classList.add('line-colour');
        }
    });

    burger.mouseleave(() => {
        let lineas = $('.linea');
        for (let i = 0; i < lineas.length; i++) {
            lineas[i].classList.remove('line-colour');
        }
    });

    /* Add rotate effect to menu burger lines */
    burgerMenu.click(() => {
        if (mobileMenu.hasClass('show-menu')) {
            removeEffect();

        } else {

            mobileMenu.addClass('show-menu');
            $('.line-one').addClass('line-1');
            $('.line-two').addClass('line-2');
            $('.line-three').addClass('line-3');
        }
    });

    closeMenu.click(() => {
        removeEffect();
    });
    /* Remove rotate effects to menu burger lines */
    function removeEffect() {
        mobileMenu.removeClass('show-menu');
        $('.line-one').removeClass('line-1');
        $('.line-two').removeClass('line-2');
        $('.line-three').removeClass('line-3');
    }



    let nav = $('nav');
    let frs = $('.frs');
    // Scroll functions
    $(window).scroll(function() {

        let separator = $('.separator').offset().top;
        let position = $(window).scrollTop() + 103;

        // Convertir navbar a blanco
        if (position > separator) {
            nav.addClass('bg-white shadow black-text');
            $('.a-nav').addClass('black');
            frs.css('display', 'inline');
        }
        // Convertir navbar a transparent
        if (position <= separator) {
            nav.removeClass('bg-white shadow');
            $('.a-nav').removeClass('black');
            frs.css('display', 'none');
        }

        // Animacion boton GOTOP
        var height = $(window).scrollTop();
        if (height > 600) {

            $('#goTop').addClass('move');
        } else {
            $('#goTop').removeClass('move');
        }
    });


    // Animacion para subir al TOP
    $('#goTop').click(function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, 1300);
        return false;
    });


    // Agregar efectos a las capturas de proyectos
    let proyectos = $('.project');

    for (let i = 0; i < proyectos.length; i++) {

        proyectos[i].addEventListener('mouseenter', () => {
            proyectos[i].lastElementChild.classList.add('move-info');
            proyectos[i].children[0].classList.add('filteroff');
        });
        proyectos[i].addEventListener('mouseleave', () => {
            proyectos[i].lastElementChild.classList.remove('move-info');
            proyectos[i].children[0].classList.remove('filteroff');
        });
    }


});