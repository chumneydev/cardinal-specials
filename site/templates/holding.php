<?php namespace ProcessWire; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div id="login">


<?php if($input->urlSegment == 'api'): ?>

    <?php

            $clientName = $_GET['client'];
            $pageType = $_GET['type'];
            $pageName = $_GET['page'];

            $combinedPageName = $clientName . "/" . $pageType ."/" .$pageName . "/";
            //echo $combinedPageName;

            $holding = $pages->get("/clients/$combinedPageName");

            echo $holding->title;
            //echo $holding->special_banner->name;



            $clientTitle = $getClient->title;

            $modalWidth = $getClient->modal_width;
            $modalHeaderColor = $getClient->client_color;
            $modalCloseButton = $getClient->modal_close_button;

            $modalOverlayClose = $getClient->modal_overlay_close;
            $modalOverlayColor = $getClient->modal_overlay_color;



                        $clientTitle = $getClient->title;

                        $modalWidth = $getClient->modal_width;
                        $modalHeaderColor = $getClient->client_color;
                        $modalCloseButton = $getClient->modal_close_button;

                        $modalOverlayClose = $getClient->modal_overlay_close;
                        $modalOverlayColor = $getClient->modal_overlay_color;









    ?>






<?php endif; ?>

</div>



<script type="text/javascript">

console.log("hey");

<?php



[
    'https://the-chumney.github.io/grid/css/compiled/cagrid.css',
    'https://www.theautohost.com/sandbox/modal/css/iziModal.min.css'
].foreach(function(href) {
    var link = document.createElement('link');
	link.href = href;
	link.rel = "stylesheet";
	link.type = "text/css";
	document.head.appendChild(link);
});

$.when(
    $.getScript("https://www.theautohost.com/sandbox/modal/js/js.cookie.js", function(){
	    console.log( "Chumney & Associates cookie was loaded." );
    }),
	$.getScript("https://www.theautohost.com/sandbox/modal/js/iziModal.min.js", function(){
	    console.log( "Chumney & Associates modal script was loaded." );
    }),
	$.getScript("https://www.theautohost.com/sandbox/modal/js/exit-intent.js", function(){
	    console.log( "Chumney & Associates exit intent was loaded." );
    })

).then(function() {
    caModalCreateEntrance();
});






function caModalCreateEntrance() {

    //if cookie is not set
    if(!Cookies.get('ca.{$combinedTitle}')) {
        Cookies.set('ca.{$combinedTitle}', '9481u3948Jfh', {expires: {$page->modal_cookie}});

        $(document).on('click', '#ca-btn-submit', function() {
            var data = {
                firstName: $("form_first_name").val(),
                lastName: $("form_last_name").val(),
                email: $("form_email").val(),
                phone: $("form_phone").val(),
            };

            if($.trim($($form_first_name).val()) === "" || $.trim($($form_last_name).val()) === "" || $.trim($($form_email).val()) === "" || $.trim($($form_phone).val()) === "" ||) {
                console.log('Please fill out all the fields');
            } // end field validation
            else {
                $('#ca-btn-submit').text('Submitting the form');
                console.log('Form Submission in Progress');

                $.ajax({
                    type: 'POST',
                    url: '{$page->httpUrl}',
                    data: data,
                    success: function() {
                        $('ca-{$currentName}').iziModal('close');
                    }
                });
            }


        }); //end click from modal

        // initialize modal
        $('$ca-{$currentName}').iziModal({
            title: '{$page->modal_title}',
            subtitle: '{$page->modal_subtitle}',
            headerColor: '{$page->modal_color_select->value}',
            closeButton: {$page->modal_close_button->value},
            overlay: {$page->modal_overlay->value},
            overlayClose: {$page->modal_overlay_close->value},
            overlayColor: 'rgba({$page->modal_overlay_color->value},{$page->modal_overlay_opacity->title})',
            autoOpen: 1,
            closeOnEscape: false,
            zindex: 99999,
            iframeURL: false,
            width: {$page->modal_width},
            transitionIn: "flipInX",
            onOpening: function(modal){
                modal.startLoading();
                $.get('{$page->httpUrl}', function(data) {
                    $("#ca-{$currentTitle} .iziModal-content").html(data);
                    modal.stopLoading();
                    console.log("loading {$currentName} ...")
                });
            }

        });


} // end function








</script>
</body>
</html>