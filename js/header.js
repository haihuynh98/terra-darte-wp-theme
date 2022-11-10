
jQuery(function ($) {
    $( window ).scroll(function() {
        var $height = $(window).scrollTop();
        if($height > 50) {
            $('#main_header').addClass('nav-has-bg');
        } else {
            $('#main_header').removeClass('nav-has-bg');
        }
    });
})
