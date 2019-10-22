$(document).ready(function () {

    $('[data-bg]').each(function () {
        $(this).css('background-image', 'url(' + $(this).attr('data-bg') + ')').css('height', '450px').css('background-repeat', 'no-repeat').css('background-size', 'cover');
    });










});