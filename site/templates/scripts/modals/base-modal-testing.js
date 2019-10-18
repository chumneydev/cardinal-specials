// This creates the css & js files for modals

[
    'https://the-chumney.github.io/grid/css/compiled/cagrid.css',
    'https://www.theautohost.com/sandbox/modal/css/iziModal.min.css'
].forEach(function(href) {
    var link = document.createElement('link');
    link.href = href;
    link.rel = "stylesheet";
    link.type = "text/css";
    document.head.appendChild(link);

}); // end creating styles

$.when(
    $.getScript("https://www.theautohost.com/sandbox/modal/js/js.cookie.js", function(){
    console.log("Chumney & Associates cookie was loaded.");
    }),
    $.getScript("https://www.theautohost.com/sandbox/modal/js/iziModal.min.js", function(){
        console.log("Chumney & Associates modal script was loaded.");
    }),
    $.getScript("https://www.theautohost.com/sandbox/modal/js/exit-intent.js", function(){
    console.log("Chumney & Associates exit intent was loaded.");
    })
).then(function() {

    if ($.isFunction(caModalCreateEntrance)) {
        caModalCreateEntrance();
    } else if ($.isFunction(caModalCreateExit)) {
        caModalCreateEntrance();
    }
    else {
        console.log('There are no modals currently available to use.')
    }


});
function caModalCreateEntrance() {
    if(!Cookies.get('ca.bsto.new-vehicle')) {
        Cookies.set('ca.bsto.new-vehicle', 'HeOQjvdZimPHisd3Ufz9', { expires: 1 });
        console.log('The cookie ca.bsto.new-vehicle has been set.')

        $(document).on('click', '#ca-btn-submit', function() {
            var data = {
                firstName: $("#form_first_name").val(),
                lastName: $("#form_last_name").val(),
                email: $("#form_email").val(),
                phone: $("#form_phone").val(),
                comments: $("#form_comments").val(),
            };

            if($.trim($("#form_first_name").val()) === "" || $.trim($("#form_last_name").val()) === "" || $.trim($("#form_email").val()) === "" || $.trim($("#form_phone").val()) === "") {
                console.log("The Form is currently not completely filled out");
            } // check to make sure form values are not blank

            else {
                $("#ca-btn-submit").text("Form Submission in Progress");
                console.log("Form Submission in Progress");

                $.ajax({
                    type: "POST",
                    url: "http://192.168.12.3:8888/development/projects/specials/pw/clients/bsto/modals/new-vehicle/",
                    data: data,
                    success: function() {
                    $('#ca-new-vehicle').iziModal('close');
                    }
                });

            }


        }); // end submit function

        //construct modal
        $('#ca-new-vehicle').iziModal({
            title: 'Hello',
            subtitle: 'This is a subtitle',
            headerColor: '#2D96CD',
            closeButton: true,
            overlay: true,
            overlayClose: false,
            overlayColor: 'rgba(0,0,0,0.5)',
            autoOpen: 1,
            closeOnEscape: false,
            zindex: 99999,
            iframeURL: false,
            width: 600,
            transitionOut: 'bounceOutDown',
        }); // end construct











    } //if no cookie is set, set one

    else if(1 == "0") {
        Cookies.remove('ca.bsto.new-vehicle');
        $(document).on('click', '#ca-btn-submit', function() {
            var data = {
                firstName: $("#form_first_name").val(),
                lastName: $("#form_last_name").val(),
                email: $("#form_email").val(),
                phone: $("#form_phone").val(),
                comments: $("#form_comments").val(),
            };

            if($.trim($("#form_first_name").val()) === "" || $.trim($("#form_last_name").val()) === "" || $.trim($("#form_email").val()) === "" || $.trim($("#form_phone").val()) === "") {
                console.log("The Form is currently not completely filled out");
            } // check to make sure form values are not blank

            else {
                $("#ca-btn-submit").text("Form Submission in Progress");
                console.log("Form Submission in Progress");

                $.ajax({
                    type: "POST",
                    url: "http://192.168.12.3:8888/development/projects/specials/pw/clients/bsto/modals/new-vehicle/",
                    data: data,
                    success: function() {
                    $('#ca-new-vehicle').iziModal('close');
                    }
                });

            }


        }); // end submit function

        //construct modal
        $('#ca-new-vehicle').iziModal({
            title: 'Hello',
            subtitle: 'This is a subtitle',
            headerColor: '#2D96CD',
            closeButton: true,
            overlay: true,
            overlayClose: false,
            overlayColor: 'rgba(0,0,0,0.5)',
            autoOpen: 1,
            closeOnEscape: false,
            zindex: 99999,
            iframeURL: false,
            width: 600,
            transitionOut: 'bounceOutDown',



        }); // end construct






    }


    else {
        console.log('ca.bsto.new-vehicle has already been set. Enjoy viewing the inventory.');

    }






}
