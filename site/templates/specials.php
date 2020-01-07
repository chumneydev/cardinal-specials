<?php

namespace ProcessWire;

header_remove("X-Frame-Options");
header("Access-Control-Allow-Origin: *");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $page->title; ?></title>
    <!--<link rel="stylesheet" type="text/css" media="all" href="https://theautohost.com/_cardinal/dist/css/cardinal.css" />-->
    <link rel="stylesheet" type="text/css" media="all" href="https://theautohost.com/_cardinal/dist/css/cardinal.min.css" />
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


    <div id="ca-container" class="small ca-specials">

        <?php if ($page->special_banner) : ?>
            <section>
                <div class="column">
                    <img src="<?= $page->special_banner->httpUrl; ?>" class="ca-image">
                </div>
            </section>

        <?php endif; ?>

        <!-- Dealer Message & Commercial-->
        <?php if ($page->special_commercial) : ?>
            <section>
                <div class="column">
                    <p class="ca-message"><?php echo $page->special_dealer_message; ?></p>
                </div>

                <div class="column">
                    <div class="video-embed">
                        <iframe width="560" height="315" src="<?= $page->special_commercial; ?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>

            </section>
        <?php else : ?>
            <section>
                <div class="column">
                    <p class="ca-message"><?= $page->special_dealer_message; ?></p>
                </div>

            </section>

        <?php endif; ?>

        <!-- Dynamic CTA Buttons -->
        <section>
            <?php foreach ($page->special_custom_buttons as $button) : ?>
                <?php
                $clientColor = $page->parent->parent->client_color->title;
                $countButtons = count($page->special_custom_buttons->find('special_custom_buttons_include=0'));
                ?>

                <!-- Check CTA Buttons Include-->
                <?php if (!$button->special_custom_buttons_include) : ?>
                    <div class="column">
                        <a href="<?= $button->special_custom_buttons_url; ?>" class="btn <?= $clientColor; ?>" target="_top"><?= $button->special_custom_buttons_text; ?></a>
                    </div>
                <?php endif; ?>


            <?php endforeach; ?>
            <!-- End Dynamic CTA Buttons -->
        </section>


        <!-- Dynamic Button Row/Grid -->

        <?php
        $i = 0;
        ?>
        <section class="ca-special">

            <?php foreach ($page->specials as $special) : ?>

                <?php
                $startDate = $special->special_start_date;
                $convertedStartDate = strtotime($startDate);
                $expirationDate = $special->special_end_date;
                $convertedExpirationDate = strtotime($expirationDate);
                $specialId = 0;
                // iteratator
                ?>


                <?php if ($page->special_layout_select->title == "Single") : ?>
                    <?php
                    if ($convertedStartDate <= $convertedToday && $convertedStartDate < $convertedExpirationDate && $convertedToday < $convertedExpirationDate) {
                        include("./partials/specials/special.inc.php");
                        $specialId++;
                        $i++;
                    }
                    ?>

                    <?php if ($i % 1 == 0) : ?>
        </section>
        <section class="ca-special">
        <?php endif; ?>

    <?php elseif ($page->special_layout_select->title == "Double") : ?>
        <?php
                    if ($convertedStartDate <= $convertedToday && $convertedStartDate < $convertedExpirationDate && $convertedToday < $convertedExpirationDate) {
                        include("./partials/specials/special.inc.php");
                        $specialId++;
                        $i++;
                    }
        ?>

        <?php if ($i % 2 == 0) : ?>
        </section>
        <section class="ca-special">

        <?php endif; ?>

    <?php elseif ($page->special_layout_select->title == "Three") : ?>
        <?php
                    if ($convertedStartDate <= $convertedToday && $convertedStartDate < $convertedExpirationDate && $convertedToday < $convertedExpirationDate) {
                        include("./partials/specials/special.inc.php");
                        $specialId++;
                        $i++;
                    }
        ?>

        <?php if ($i % 3 == 0) : ?>
        </section>
        <section class="ca-special">

        <?php endif; ?>


    <?php elseif ($page->special_layout_select->title == "Four") : ?>
        <?php
                    if ($convertedStartDate <= $convertedToday && $convertedStartDate < $convertedExpirationDate && $convertedToday < $convertedExpirationDate) {
                        include("./partials/specials/special.inc.php");
                        $specialId++;
                        $i++;
                    }
        ?>

        <?php if ($i % 4 == 0) : ?>
        </section>
        <section class="ca-special">

        <?php endif; ?>





    <?php endif; ?>




<?php endforeach; ?>
        </section>


        <script src="<?php echo $config->urls->templates; ?>scripts/jquery.js"></script>
        <script src="<?php echo $config->urls->templates; ?>scripts/all.min.js"></script>
        <script src="<?php echo $config->urls->templates; ?>scripts/print.min.js"></script>

</body>

</html>