$().ready(() => {
    'use strict'



    let nav = $('nav');
    let frs = $('.frs');

    $(window).scroll(function() {

        let separator = $('.separator').offset().top;
        let position = $(window).scrollTop() + 103;

        if (position > separator) {
            nav.addClass('bg-white shadow black-text');
            $('.prueba').addClass('black');
            /*             nav.css('background-color', 'rgba(0, 0, 0, 0.78)'); //añadir bgwhite
                        nav.css('box-shadow', '0px 7px 13px -7px rgba(0,0,0,0.8)'); //añadir shadow */
            frs.css('display', 'inline');
        }
        if (position <= separator) {
            nav.removeClass('bg-white shadow');
            $('.prueba').removeClass('black');
            /*  nav.css('background-color', 'transparent'); //quitar bgwhite
             nav.css('box-shadow', 'unset'); //quitar shadow */
            frs.css('display', 'none');
        }

        var height = $(window).scrollTop();
        if (height > 600) {
            $('#goTop').fadeIn();
        } else {
            $('#goTop').fadeOut();
        }
    });



    $('#goTop').click(function(event) {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, 1300);
        return false;
    });




});