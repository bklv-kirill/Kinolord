import $ from 'jquery';

$(document).ready(function () {
    const scrollToTopButton = $('.scroll-to-top-button');

    if (scrollToTopButton.length !== 0) {
        scrollToTopButton.on('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    $(window).scroll(function () {
        if ($(this).scrollTop() >= 300) {
            scrollToTopButton.css('display', 'block');
        } else {
            scrollToTopButton.css('display', 'none');
        }
    });
});
