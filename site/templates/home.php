<?php namespace ProcessWire; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= $config->urls->templates?>styles/iziToast.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css" />
    <link rel="stylesheet" media="all" href="https://rawgit.com/hankchizljaw/boilerform/master/dist/css/boilerform.min.css" />
<link rel="stylesheet" type="text/css" href="<?= $config->urls->templates?>styles/iziModal.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= $config->urls->templates?>styles/dash.one.css" />


</head>
<body>
<?php
/*
Notes
- Add Buttons you want (repeater) with urls
- Each Special has url field
*/


?>

<div id="test">



</div>



<div id="dashboard">

    <div id="header" class="ca-twelve">
        <!--
            Actions might go here

            <ul class="actions">
                <li><a href="#">Action</li>
                <li><a href="#">Action</li>
                <li><a href="#">Action</li>
            </ul>
        -->

    </div>



    <!-- Begin Sidebar -->
    <div id="sidebar" class="ca-two">
        <h3>Notifications</h3>
        <!-- Start Notification -->
        <div class="notification">
            <a href="#">
                <span class="fa-stack">
                    <i class="fas fa-circle fa-stack-2x" data-fa-transform="shrink-4" ></i>
                    <i class="far fa-minus fa-stack-1x"></i>
                </span>
            </a>
            <h4><i class="fas fa-paper-plane"></i> 10/30/18</h4>
            <p>Some BSTO specials have expired.</p>
        </div>
        <!-- End Notification -->
    </div>
    <!-- End Sidebar -->






    <div id="clients" class="ca-three" data-simplebar>
        <?php $clients = $pages->find("parent.template=holding, sort=sort"); ?>

        <div id="client-count">
            <p>Displaying <span><?= count($clients); ?></span> Clients</p>

            <form action="./">
                <div class="controls">
                    <button type="submit" form="form1" value="Client" class="add-client" data-izimodal-open="#add-client">Client <i class="fas fa-plus-square"></i></button>
                </div>
            </form>


        </div>

        <p class="sorting">B</p>
            <div class="client" data-selected="bski">
                <p class="client-code">BSKI</p>
                <p>Bev Smith Kia of Fort Pierce</p>
            </div>

            <div class="client">
                <p class="client-code">BSKS</p>
                <p>Bev Smith Kia</p>
            </div>

            <div class="client">
                <p class="client-code">BSTO</p>
                <p>Bev Smith Toyota</p>
            </div>


            <p class="sorting">B</p>
                <div class="client">
                    <p class="client-code">BSKI</p>
                    <p>Bev Smith Kia of Fort Pierce</p>
                </div>

                <div class="client">
                    <p class="client-code">BSKS</p>
                    <p>Bev Smith Kia</p>
                </div>

                <div class="client">
                    <p class="client-code">BSTO</p>
                    <p>Bev Smith Toyota</p>
                </div>


                <p class="sorting">B</p>
                    <div class="client">
                        <p class="client-code">BSKI</p>
                        <p>Bev Smith Kia of Fort Pierce</p>
                    </div>

                    <div class="client">
                        <p class="client-code">BSKS</p>
                        <p>Bev Smith Kia</p>
                    </div>

                    <div class="client">
                        <p class="client-code">BSTO</p>
                        <p>Bev Smith Toyota</p>
                    </div>


                    <p class="sorting">B</p>
                        <div class="client">
                            <p class="client-code">BSKI</p>
                            <p>Bev Smith Kia of Fort Pierce</p>
                        </div>

                        <div class="client">
                            <p class="client-code">BSKS</p>
                            <p>Bev Smith Kia</p>
                        </div>

                        <div class="client">
                            <p class="client-code">BSTO</p>
                            <p>Bev Smith Toyota</p>
                        </div>






            <?php //generateClientList(); ?>




    </div>
    <!-- End Clients -->

    <div id="content" class="ca-nine" data-simplebar>

        <div id="client">
            <h2 class="client-code">BSKI</h2>
            <h2>Bev Smith Kia of Fort Pierce</h2>

        </div>

        <div id="actions">
            <form action="./">
                <div class="controls">
                    <button type="submit" form="form1" value="Submit">Special <i class="fas fa-plus-square"></i></button>
                    <button type="submit" form="form1" value="Submit">Modal <i class="fas fa-plus-square"></i></button>
                </div>
            </form>

        </div>



        <div id="specials">
            <h3>Specials</h3>



            <div class="special">
                <p class="title">New Vehicle Specials</p>
                <form action="./">
                    <div class="controls">
                        <button class="edit"><i class="fas fa-pen-square"></i></button>
                        <button class="delete"><i class="fas fa-minus-square"></i></button>
                    </div>
                </form>
            </div>
            <div class="special">
                <p class="title">Used Vehicle Specials</p>
                <form action="./">
                    <div class="controls">
                        <button class="edit"><i class="fas fa-pen-square"></i></button>
                        <button class="delete"><i class="fas fa-minus-square"></i></button>
                    </div>
                </form>

            </div>


        </div>

        <div id="modals">
            <h3>Modals</h3>


            <div class="modal">
                <p class="title">New Vehicle Specials</p>
                <form action="./">
                    <div class="controls">
                        <button class="edit"><i class="fas fa-pen-square"></i></button>
                        <button class="delete"><i class="fas fa-minus-square"></i></button>
                    </div>
                </form>
            </div>


        </div>






    </div>
    <!-- End Content -->








</div>
<!-- End Container -->

<?php
    include("./partials/modals.php");
?>




<script src="<?= $config->urls->templates; ?>scripts/jquery.js"></script>
<script src="https://unpkg.com/vue"></script>
<script src="<?= $config->urls->templates; ?>scripts/all.min.js"></script>
<script src="<?= $config->urls->templates; ?>scripts/iziToast.min.js"></script>
<script src="https://unpkg.com/simplebar@latest/dist/simplebar.js"></script>
<script src="<?= $config->urls->templates; ?>scripts/iziModal.min.js"></script>
<script src="<?= $config->urls->templates; ?>scripts/main.js"></script>


<script type="text/javascript">
    //Barba.Pjax.Dom.wrapperId = 'container';
    //Barba.Pjax.Dom.containerClass = 'wrapper';
    //Barba.Pjax.start();

    //add new client
    $(document).on('click', '.add-client', function (event) {
        event.preventDefault();
        // $('#modal').iziModal('setZindex', 99999);
        // $('#modal').iziModal('open', { zindex: 99999 });
        $('#add-client').iziModal({
            title: 'Create a Client',
             subtitle: '',
             headerColor: '#88A0B9',
             background: null,
             theme: '',  // light
             icon: null,
             iconText: null,
             iconColor: '',
             rtl: false,
             width: 850,
             top: null,
             bottom: null,
             borderBottom: true,
             padding: 0,
             radius: 3,
             zindex: 999,
             focusInput: true,
             group: '',
             loop: false,
             arrowKeys: true,
             navigateCaption: true,
             navigateArrows: true, // Boolean, 'closeToModal', 'closeScreenEdge'
             history: false,
             restoreDefaultContent: false,
             autoOpen: 0, // Boolean, Number
             bodyOverflow: false,
             fullscreen: false,
             openFullscreen: true,
             closeOnEscape: false,
             closeButton: true,
             appendTo: 'body', // or false
             appendToOverlay: 'body', // or false
             overlay: true,
             overlayClose: true,
             overlayColor: 'rgba(0, 0, 0, 0.4)',
             timeout: false,
             timeoutProgressbar: false,
             pauseOnHover: false,
             timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
             transitionIn: 'comingIn',
             transitionOut: 'comingOut',
             transitionInOverlay: 'fadeIn',
             transitionOutOverlay: 'fadeOut',
             onFullscreen: function(){},
             onResize: function(){},
             onOpening: function(){},
             onOpened: function(){},
             onClosing: function(){},
             onClosed: function(){},
             afterRender: function(){}
        });
    });


</script>





















<script type="text/javascript">

</script>



</body>
</html>
