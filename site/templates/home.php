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


/*
    $startDate = $special->special_start_date;
    $convertedStartDate = strtotime($startDate);
    $expirationDate = $special->special_end_date;
    $convertedExpirationDate = strtotime($expirationDate);
*/
?>


    <!-- container -->
    <div id="ca-container">


        <?php
            $clients = $pages->find("template=clients,parent=$page->children->children");
            $i = 0;
        ?>


        <section>
            <?php foreach ($clients as $client) : ?>

                <div class="column">
                    <div class="client">
                        <h2><?= $client->title; ?></h2>

                        <?php foreach ($client->children as $special) : ?>
                            <p><?= $special->title; ?></p>


                        <?php endforeach; ?>

                    </div>
                </div>
                <?php $i++; ?>

                <?php if ($i % 3 == 0) : ?>
                    </section>
                    <section>

                <?php endif; ?>

        <?php endforeach; ?>
    </section>












    </div>
    <!-- container-->





    <script src="<?= $config->urls->templates; ?>scripts/jquery.js"></script>
    <script src="<?= $config->urls->templates; ?>scripts/iziToast.min.js"></script>
    <script src="<?= $config->urls->templates; ?>scripts/iziModal.min.js"></script>
    <script src="<?= $config->urls->templates; ?>scripts/main.js"></script>


    <script type="text/javascript">
    </script>



</body>
</html>