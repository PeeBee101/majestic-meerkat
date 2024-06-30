jQuery(document).ready(function($) {
    $('.hamburger').click(function() {
        $(this).toggleClass('is-active');
        $('html, body').toggleClass('is-hidden');
        $('.menu').toggleClass('is-hidden');
        $('.logo a img').toggleClass('is-active');
    });
});