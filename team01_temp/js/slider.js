/* slider.js */

'use strict';

$(function() {
    //settings for slider
    var width = '100vw';
    var animationSpeed = 1000;
    var pause = 6000;
    var currentSlide = 1;

    //cache DOM elements
    // var $slider = $('#slider');
    // var $slideContainer = $('.slides', $slider);
    // var $slides = $('.slide', $slider);

    var interval;

    function startSlider() {
        interval = setInterval(function() {
            $('#slider ul').animate({'margin-left': '-=' + width}, animationSpeed, function() {
                if (++currentSlide === $('#slider ul li').length) {
                    currentSlide = 1;
                    $('#slider ul').css('margin-left', 0);
                }
            });
        }, pause);
    }
    function pauseSlider() {
        clearInterval(interval);
    }

    $('#slider ul')
        .on('mouseenter', pauseSlider)
        .on('mouseleave', startSlider);

    startSlider();
});

