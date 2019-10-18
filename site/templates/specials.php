<?php namespace ProcessWire;
header_remove("X-Frame-Options");
header("Access-Control-Allow-Origin: *");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title><?= $page->title; ?></title>
    <link rel="stylesheet" type="text/css" media="all" href="https://the-chumney.github.io/grid/css/compiled/cagrid.css" />
    <link rel="stylesheet" type="text/css" href="<?= $config->urls->templates ?>styles/specials.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-6jHF7Z3XI3fF4XZixAuSu0gGKrXwoX/w3uFPxC56OtjChio7wtTGJWRW53Nhx6Ev" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= $config->urls->templates ?>styles/specials.css" />

</head>

<body>

    <?php
    // global variables
    $countSpecialButtons = count($page->special_custom_buttons->find('special_custom_buttons_include=1'));

    $buttonsIncluded = $page->special_custom_buttons->find('special_custom_buttons_include=1');
    $buttonsIncludedCount = count($page->special_custom_buttons->find('special_custom_buttons_include=1'));
    $buttonsIncludedCountAdditional = $buttonsIncludedCount + 1;
    $buttonCalculateRemainder =  12 / $buttonsIncludedCountAdditional;

    ?>


    <div id="ca-specials" class="ca-container">

        <?php if ($page->special_banner) : ?> 
            <div class="ca-row">
                <div class="ca-col-12">
                    <img src="<?= $page->special_banner->httpUrl; ?>" class="ca-image">
                </div>
            </div>

        <?php endif; ?> 

        <!-- Dealer Message & Commercial-->
        <?php if ($page->special_commercial) : ?>
            <div class="ca-row">
                <div class="ca-col-6">
                    <p class="ca-message"><?php echo $page->special_dealer_message; ?></p>
                </div>

                <div class="ca-col-6">
                    <div class="ca-video">
                        <iframe width="560" height="315" src="<?= $page->special_commercial; ?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>

            </div>
        <?php else : ?>
            <div class="ca-row">
                <div class="ca-col-12">
                    <p class="ca-message"><?= $page->special_dealer_message; ?></p>
                </div>

            </div>

        <?php endif; ?>

        <!-- Dynamic CTA Buttons -->



        <div class="ca-row">
            <?php foreach ($page->special_custom_buttons as $button) : ?>
                <?php
                $clientColor = $page->parent->parent->client_color->title;
                $countButtons = count($page->special_custom_buttons->find('special_custom_buttons_include=0'));

                ?>

                <!-- Check CTA Buttons Include-->
                <?php if (!$button->special_custom_buttons_include) : ?>


                    <?php if ($countButtons == 2) : ?>
                        <div class="ca-col-6">
                            <a href="<?= $button->special_custom_buttons_url; ?>" class="ca-btn-<?= $clientColor; ?>" target="_top"><?= $button->special_custom_buttons_text; ?></a>
                        </div>
                    <?php elseif ($countButtons == 3) : ?>
                        <div class="ca-col-4">
                            <a href="<?= $button->special_custom_buttons_url; ?>" class="ca-btn-<?= $clientColor; ?>" target="_top"><?= $button->special_custom_buttons_text; ?></a>
                        </div>
                    <?php elseif ($countButtons == 4) : ?>
                        <div class="ca-col-3">
                            <a href="<?= $button->special_custom_buttons_url; ?>" class="ca-btn-<?= $clientColor; ?>" target="_top"><?= $button->special_custom_buttons_text; ?></a>
                        </div>

                    <?php endif; ?>


                <?php endif; ?>


            <?php endforeach; ?>
            <!-- End Dynamic CTA Buttons -->
        </div>




        <!-- Dynamic Button Row/Grid -->
        <?php foreach ($page->specials as $special) : ?>


            <?php

            $startDate = $special->special_start_date;
            $convertedStartDate = strtotime($startDate);
            $expirationDate = $special->special_end_date;
            $convertedExpirationDate = strtotime($expirationDate);

            if ($convertedStartDate <= $convertedToday && $convertedStartDate < $convertedExpirationDate && $convertedToday < $convertedExpirationDate) {
                include("./partials/specials/special.inc.php");
            }



            ?>







        <?php endforeach; ?>



        <script src="<?php echo $config->urls->templates; ?>scripts/jquery.js"></script>
        <script src="<?php echo $config->urls->templates; ?>scripts/all.min.js"></script>
        <script src="<?php echo $config->urls->templates; ?>scripts/print.min.js"></script>



</body>

</html>