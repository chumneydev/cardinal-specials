<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Offer Insert</title>
    <link rel="stylesheet" href="https://cdl.chumdev.com/site/templates/styles/buy.back.min.css">
</head>
<body>


<!-- offer insert -->
<div class="ca-offer-insert">

<div class="ca-head">
    <img src="<?= $page->special_image->httpUrl ?>" alt="<?= $page->title; ?>" />
    <div class="ca-alignment">
        <div class="ca-offer">
            <h1><?= $page->title; ?></h1>
            <?= $page->body; ?>
            <p class="ca-view-disclaimer"><a href="#">View Disclaimer</a></p>
            <div class="ca-disclaimer">
                <a href="#" class="ca-close">X</a>
                <h1><?= $page->title; ?></h1>
                <p><?= $page->special_disclaimer; ?></p>
            </div>
            <ul class="ca-buttons">
                <li><a href="<?= $page->offer_button_url_one ?>" class="offer-btn <?= $page->client_color->title ?>"><?= $page->offer_button_text_one ?></a></li>
                <li><a href="<?= $page->offer_button_url_two ?>" class="offer-btn"><?= $page->offer_button_text_two ?></a></li>
            </ul>
        </div>
    </div>
</div>


</div>
<!-- offer insert -->












<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="http://cdl.chumdev.com/site/templates/scripts/disclaimer.js" ></script>
</body>
</html>
