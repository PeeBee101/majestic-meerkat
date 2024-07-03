jQuery(document).ready(function($) {
    // Burger menu class toggles for CSS changes
    $('.hamburger').click(function() {
        $(this).toggleClass('is-active');
        $('body').toggleClass('open-menu')
        $('.logo a img').toggleClass('is-active');
    });

    // Scroll function to change the menu
    function toggleScrolledClass() {
        if ($(window).scrollTop() > 100) {
            $('.logo-block, .menu-block').addClass('scrolled');
        } else if (!$('body').hasClass('open-menu')) {
            $('.logo-block, .menu-block').removeClass('scrolled');
        }
    }

    // Check the scroll position when the page loads
    toggleScrolledClass();

    // Attach the scroll event listener
    $(window).scroll(function() {
        toggleScrolledClass();
    });
});