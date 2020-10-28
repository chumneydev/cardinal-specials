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
    <link rel="stylesheet" type="text/css" media="all" href="https://theautohost.com/_cardinal/dist/css/cardinal.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= $config->urls->templates ?>styles/blog.css" />
</head>
<body>



    <div id="ca-container">


        <!-- blog -->
        <?php $posts = $page->children('sort=-created'); ?>
        <?php foreach($posts as $post): ?>

            <section class="copy">
                <div class="column">
                    <h1><?= $post->title ?></h1>
                    <p class="ca-date"><?= date("M d, Y", $post->created); ?></p>
                    <?= $post->body; ?>
                </div>
            </section>



            <section class="images">

                <?php foreach($post->images as $postImage): ?>

                    <div class="column">
                        <img src="<?= $postImage->httpUrl; ?>" class="ca-image" alt="<?= $postImage->description; ?>" />
                    </div>
                <?php endforeach; ?>
            </section>

            <hr>
        <?php endforeach; ?>
        <!-- blog -->

    </div>



    <script src="<?php echo $config->urls->templates; ?>scripts/jquery.js"></script>

</body>
</html>