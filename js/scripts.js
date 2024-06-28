jQuery(document).ready(function($) {
    $('.hamburger').click(function() {
        $('.header-bottom-container').toggleClass('is-active');
        $('html, body').toggleClass('is-hidden');
    });
    $('.sub-menu-link').click(function() {
        $(this).toggleClass('is-active');
        $(this).next().toggleClass('is-active');
    });
});