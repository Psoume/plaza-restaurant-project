$(document).ready(function(){

/*NAVBAR*/

$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll > 100) {
        $('nav').fadeIn();
    } else {
        $('nav').fadeOut();
    }
});

});