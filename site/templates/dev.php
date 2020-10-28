<?php namespace ProcessWire;

    /*$imagePath = $page->parent->special_image->url;

    echo $imagePath;*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cardinal Grid</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://theautohost.com/_cardinal/dist/css/cdl.min.css">
</head>
<body>

<!-- container -->
<div class="ca-container">

    <section>
        <div class="column">
            
            <!-- form -->
            <form class="ca-form">
                <?php $forms = $page->form_select; ?>
                <?php foreach (explode("\n\n", $forms) as $selectfield): ?>

                    <section>
                        <div class="column has-field">
                            <?= $selectfield; ?>
                        </div>
                    </section>

                <?php endforeach; ?>

            </form>
            <!-- form -->

        </div>
    </section>







</div>
<!-- container -->






</body>
</html>






