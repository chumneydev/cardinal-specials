<?php namespace ProcessWire; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?= $config->urls->templates ?>styles/iziToast.min.css" />
    <link rel="stylesheet" href="https://theautohost.com/_cardinal/dist/css/cardinal.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= $config->urls->templates ?>styles/iziModal.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= $config->urls->templates ?>styles/dashboard.min.css" />

</head>

<body>

<?php
    $todaysDate = date("F j, Y H:i");
    $todaysDateMinusTime = date("F j, Y");
    $convertTodaysDate = strtotime($todaysDate);
?>


    <!-- app -->
    <div id="app">

        <!-- header -->
        <section id="header"></section>
        <!-- header -->

        <!-- sidebar -->
        <section id="sidebar"></section>
        <!-- sidebar -->

        <!-- clients -->
        <section id="clients">
            <?php
                $all = $pages->count('template=specials|modals|slideshows|insert-offers');
                $specials = $pages->count('template=specials');
                $modals = $pages->count('template=modals');
                $slides = $pages->count('template=slides');
            ?>

            <div class="controls">
			    <ul id="sorting">
				    <li><a class="control" data-filter="all" href="#">All <span><?= $all ?></span></a></li>
				    <li><a class="control" data-filter=".specials" href="#">Specials <span><?= $specials ?></span></a></li>
				    <li><a class="control" data-filter=".modals" href="#">Modals <span><?= $modals ?></span></a></li>
				    <li><a class="control" data-filter=".slides" href="#">Slides <span><?= $all ?></span></a></li>

				    <li><a class="control" class="control" data-sort="default:asc" href="#">Up</a></li>
				    <li><a class="control" data-sort="default:desc" href="#">Down</a></li>
			    </ul>
			    <input type="text" class="input" data-ref="input-search" placeholder="Search for Client"/>
		    </div>

            <div id="results" data-ref="container">
                <?php include("./partials/dashboard/clients.php"); ?>
                
                <!-- loop through clients -->

                <!--<div id="" class="client mix abc specials">
                    <div class="info">
                        <h1>ABC</h1>
                        <h2>ABC</h2>
                    </div>    
                    <ul>
                        <li data-class="modals">Modals</li>
                        <li data-class="specials">Specials</li>
                        <li data-class="modals">Insert Offers</li>
                    </ul>

                </div>
                <div id="" class="client mix demo slides">
                    <div class="info">
                        <h1>Demo</h1>
                        <h2>DEMO</h2>
                    </div>    
                    <ul>
                        <li data-class="modals">Modals</li>
                        <li data-class="specials">Specials</li>
                        <li data-class="modals">Insert Offers</li>
                    </ul>

                </div>-->

<!-- loop through clients -->









            </div>
            
        </section>
        <!-- clients -->

        <!-- actions -->
        <section id="actions">
            
            <div class="item special">
                <h2>Sollicitudin Fringilla Sem Nibh</h2>
            </div>







        </section>
        <!-- actions -->











    </div>
    <!-- app -->





    <script src="<?= $config->urls->templates; ?>scripts/jquery.js"></script>
    <script src="<?= $config->urls->templates; ?>scripts/iziToast.min.js"></script>
	<script src="<?= $config->urls->templates?>scripts/mixitup.min-min.js"></script>
    <script src="<?= $config->urls->templates; ?>scripts/mix-min.js"></script>
    <script src="<?= $config->urls->templates; ?>scripts/main-min.js"></script>
    <script src="<?= $config->urls->templates; ?>scripts/all.min.js"></script>


    <script type="text/javascript">


    </script>



</body>
</html>