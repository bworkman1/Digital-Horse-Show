$(function () {
    var height = $( '.videoSide' ).height();
    var width = $( window ).width();
    if (width > 767) {
        $('.navbar-toggle').click(function () {
            $('.navbar-nav').toggleClass('slide-in');
            $('.side-body').toggleClass('body-slide-in');
            $('#search').removeClass('in').addClass('collapse').slideUp(200);
        });
    }
    // Remove menu for searching
    $('#search-trigger').click(function () {
        $('.navbar-nav').removeClass('slide-in');
        $('.side-body').removeClass('body-slide-in');
    });

    var page = $('#menu-page').data('page');
    $('#nav-'+page).addClass('active');


    $('.dropdown').mouseenter('show.bs.dropdown', function(e){
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown(100);
    });

    $('.dropdown').mouseleave('hide.bs.dropdown', function(e){
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
    });

    $(".auto-dismiss").fadeTo(8000, 500).slideUp(500, function(){
        $(".auto-dismiss").alert('close');
    });

    if($('[data-toggle="tooltip"]').length>0) {
        $('[data-toggle="tooltip"]').tooltip();
    }

    if($('.selector').length>0) {
        $(".selector").select2();
    }
});