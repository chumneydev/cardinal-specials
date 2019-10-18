function caModalCreateExit() {
    if(!Cookies.get('ca.<?php echo $combinedTitle; ?>')) {
        Cookies.set('ca.<?php echo $combinedTitle; ?>', '<?php echo $randomNumber; ?>', { expires: <?php echo $modalCookie; ?> });
        console.log('The cookie ca.<?php echo $combinedTitle; ?> has been set.')

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
                    url: "<?php echo $page->parent->httpUrl; ?>",
                    data: data,
                    success: function() {
                    $('#ca-<?php echo $currentName; ?>').iziModal('close');
                    }
                });

            }


        }); // end submit function


        $.exitIntent('enable');
        $(document).bind('exitintent', function() {

        }); // end exit

        //construct modal
        $('#ca-<?php echo $currentName; ?>').iziModal({
            title: '<?php echo $modalTitle;?>',
            subtitle: '<?php echo $modalSubTitle;?>',
            headerColor: '<?php echo $modalHeaderColor?>',
            closeButton: <?php echo $modalIncludeCloseButton; ?>,
            overlay: <?php echo $modalOverlayInclude; ?>,
            overlayClose: <?php echo $modalOverlayClose; ?>,
            overlayColor: 'rgba(<?php echo $modalOverlayColor;?>,<?php echo $modalOverlayOpacity;?>)',
            autoOpen: 1,
            closeOnEscape: false,
            zindex: 99999,
            iframeURL: false,
            width: <?php echo $modalWidth;?>,
            transitionIn: 'comingIn',
            transitionOut: '<?php echo $modalTransition; ?>',
        }); // end construct











    } //if no cookie is set, set one

    else if(<?php echo $modalCookie; ?> == "0") {
        Cookies.remove('ca.<?php echo $combinedTitle; ?>');
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
                    url: "<?php echo $page->parent->httpUrl; ?>",
                    data: data,
                    success: function() {
                    $('#ca-<?php echo $currentName; ?>').iziModal('close');
                    }
                });

            }


        }); // end submit function

        //construct modal
        $('#ca-<?php echo $currentName; ?>').iziModal({
            title: '<?php echo $modalTitle;?>',
            subtitle: '<?php echo $modalSubTitle;?>',
            headerColor: '<?php echo $modalHeaderColor?>',
            closeButton: <?php echo $modalIncludeCloseButton; ?>,
            overlay: <?php echo $modalOverlayInclude; ?>,
            overlayClose: <?php echo $modalOverlayClose; ?>,
            overlayColor: 'rgba(<?php echo $modalOverlayColor;?>,<?php echo $modalOverlayOpacity;?>)',
            autoOpen: 1,
            closeOnEscape: false,
            zindex: 99999,
            iframeURL: false,
            width: <?php echo $modalWidth;?>,
            transitionIn: 'comingIn',
            transitionOut: '<?php echo $modalTransition; ?>',



        }); // end construct






    }


    else {
        console.log('ca.<?php echo $combinedTitle; ?> has already been set. Enjoy viewing the inventory.');

    }






}


comingOut
bounceOutDown
bounceOutUp
fadeOutDown
fadeOutUp
fadeOutLeft
fadeOutRight
flipOutX



