$(document).ready(function () {


$('.ca-view-disclaimer').click(function(e) {
            e.preventDefault();
            $('.ca-disclaimer').fadeIn();
        });

        $('.ca-close').click(function (e) {
            e.preventDefault();
            $('.ca-disclaimer').fadeOut();
        });

    });