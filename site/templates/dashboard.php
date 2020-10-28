<?php namespace ProcessWire; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/iziToast.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/main.css" />


</head>
<body>






<div id="container">

    <div id="header">

        <div id="login">
            <p>Welcome <?php echo $user->user_full_name; ?></p>
        </div>



    </div>
    <!-- End Header -->

    <div id="sidebar">
      <h4>Clients</h4>
      <a class="create-client" href="#"><span class="fa-stack">
        <i class="fas fa-circle fa-stack-2x"></i>
        <i class="far fa-plus fa-stack-1x"></i>
    </span></a>
      <ul>
          <?php $clients = $pages->find("template=clients, assigned_to=$user"); ?>
          <?php foreach($clients as $client): ?>
              <li><a href="<?php echo $client->url; ?>"><?php echo $client->title; ?></a></li>
          <?php endforeach; ?>
      </ul>

      <h4>Notifications</h4>

      <div class="notification">

          <a href="#"><span class="fa-stack">
              <i class="fas fa-circle fa-stack-2x" data-fa-transform="shrink-4" ></i>
              <i class="far fa-minus fa-stack-1x"></i>
          </span></a>

          <h4><i class="fas fa-paper-plane"></i> 10/30/18</h4>
          <p>Some BSTO specials have expired.</p>
      </div>

      <div class="notification">

          <a href="#"><span class="fa-stack">
              <i class="fas fa-circle fa-stack-2x" data-fa-transform="shrink-4"></i>
              <i class="far fa-minus fa-stack-1x"></i>
          </span></a>

          <h4><i class="fas fa-paper-plane"></i> 11/02/18</h4>
          <p>Some BSTO specials are about to expire.</p>
      </div>

      <div class="notification">

          <a href="#"><span class="fa-stack">
              <i class="fas fa-circle fa-stack-2x" data-fa-transform="shrink-4"></i>
              <i class="far fa-minus fa-stack-1x"></i>
          </span></a>

          <h4><i class="fas fa-paper-plane"></i> 10/30/18</h4>
          <p>Some BSTO specials have expired.</p>
      </div>

      <?php getNotifications(); ?>







    </div>
    <!-- End Sidebar-->


    <div id="content">

        <div id="specials">
            <h2>Specials</h2>
            <div class="item">
                <h3>BSKI</h3>
                <a href="#"><span class="fa-stack fa-1x">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="far fa-plus fa-stack-1x"></i>
              </span></a>
                <div class="item-item">
                  <h4>New Specials</h4>
                  <ul class="item-actions">
                      <li><a href="#"><i class="far fa-pause"></i></a></li>
                      <li><a href="#"><i class="far fa-minus-circle"></i></a></li>
                      <li><a href="#"><i class="far fa-edit"></i></a></li>
                      <li><a href="#"><i class="far fa-external-link-square-alt"></i></a></li>
                  </ul>
                </div>
                <div class="item-item">
                  <h4>Used Specials</h4>
                  <ul class="item-actions">
                      <li><a href="#"><i class="far fa-pause"></i></a></li>
                      <li><a href="#"><i class="far fa-minus-circle"></i></a></li>
                      <li><a href="#"><i class="far fa-edit"></i></a></li>
                      <li><a href="#"><i class="far fa-external-link-square-alt"></i></a></li>
                  </ul>
                </div>
            </div>

            <div class="item">
                <h3>BSTO</h3>
                <a href="#"><span class="fa-stack">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="far fa-plus fa-stack-1x"></i>
              </span></a>
                <div class="item-item">
                  <h4 data-page-status="unpublished">New Specials</h4>
                  <ul class="item-actions">
                      <li><a href="#" class="special-pause" data-pause-id="1662"><i class="far fa-pause"></i></a></li>
                      <li><a href="#"><i class="far fa-minus-circle"></i></a></li>
                      <li><a href="#"><i class="far fa-edit"></i></a></li>
                      <li><a href="#"><i class="far fa-external-link-square-alt"></i></a></li>
                  </ul>
                </div>
                <div class="item-item">
                  <h4>Used Specials</h4>
                  <ul class="item-actions">
                      <li><a href="#"><i class="far fa-pause"></i></a></li>
                      <li><a href="#"><i class="far fa-minus-circle"></i></a></li>
                      <li><a href="#"><i class="far fa-edit"></i></a></li>
                      <li><a href="#"><i class="far fa-external-link-square-alt"></i></a></li>
                  </ul>
                </div>
                <div class="item-item">
                  <h4>Service Specials</h4>
                  <ul class="item-actions">
                      <li><a href="#"><i class="far fa-pause"></i></a></li>
                      <li><a href="#"><i class="far fa-minus-circle"></i></a></li>
                      <li><a href="#"><i class="far fa-edit"></i></a></li>
                      <li><a href="#"><i class="far fa-external-link-square-alt"></i></a></li>
                  </ul>
                </div>
            </div>

        </div>


            <div id="demo">
                <?php //generateSpecialsList('specials');?>

                <?php $clients->find("parent.template=holding, sort=sort"); ?>
                <ul>
                    <?php foreach($clients as $client): ?>
                        <li><?php echo $client->title; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

    <!-- End Content -->



</div>




</div>
<!-- End Container -->

<?php include("alerts/notes.php"); ?>



<script src="<?php echo $config->urls->templates; ?>scripts/jquery.js"></script>
<script src="https://unpkg.com/vue"></script>
<script src="<?php echo $config->urls->templates; ?>scripts/all.min.js"></script>
<script src="<?php echo $config->urls->templates; ?>scripts/main.js"></script>
<script src="<?php echo $config->urls->templates; ?>scripts/iziToast.min.js"></script>
<script src="<?php echo $config->urls->templates; ?>scripts/ajax-calls.js"></script>

<script type="text/javascript">
    //Barba.Pjax.Dom.wrapperId = 'container';
    //Barba.Pjax.Dom.containerClass = 'wrapper';
    //Barba.Pjax.start();
</script>

<script type="text/javascript">
    const app = new Vue({
        el: '#demo',
        data: {
            clients: []
        },
        created () {
            fetch('http://192.168.12.3:8888/development/projects/specials/pw/ajax-actions/render-specials/')
            .then(response => response.json())
            .then(json => {
                this.clients = json.clients
            })
        }
    })




//http://192.168.12.3:8181/development/projects/specials/pw/ajax-actions/render-specials/
//https://api.myjson.com/bins/74l63

</script>


<script type="text/javascript">
  $(".item-actions").slideUp();
  $(".item-item").mouseenter(function(){
    $(this).children("ul").slideDown(200)
  })
  $(".item-item").mouseleave(function(){
    $(this).children("ul").slideUp(200)
  })
</script>



</body>
</html>
