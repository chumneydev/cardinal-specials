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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="https://theautohost.com/_cardinal/dist/css/cdl.min.css" />
  <style type="text/css">

  </style>
</head>

<body>

    <!-- container -->
    <div class="ca-container">
        <section>
            <div class="column">
                <div id="ca-slides" class="slider">
                    <?php foreach ($page->specials as $slide): ?>

                    <?php
                        $startDate = $slide->special_start_date;
                        $convertedStartDate = strtotime($startDate);
                        $expirationDate = $slide->special_end_date;
                        $convertedExpirationDate = strtotime($expirationDate);
                        $slideID = 0;
                    ?>


                    <?php if ($convertedStartDate <= $convertedToday && $convertedStartDate < $convertedExpirationDate && $convertedToday < $convertedExpirationDate): ?>
                        <div>
                            <a href="<?= $slide->special_url; ?>" target="_top">
                                <img src="<?= $slide->special_image->httpUrl; ?>" class="ca-image" alt="<?= $slide->special_image->desctiption; ?>" />
                            </a>
                        </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <section>
    </div>
    <!-- container -->


    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

        <script type="text/javascript">
            $(document).on('ready', function() {
                $("#ca-slides").slick({
                    dots: false,
                    vertical: false,
                    centerMode: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    autoplay: true,
                    autoplaySpeed: 3000,
                });
            });
    </script>


</body>
</html>