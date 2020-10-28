<?php
    namespace ProcessWire;
    header('Access-Control-Allow-Origin: *');
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://theautohost.com/_cardinal/bundle/dist/css/cardinal.min.css">
</head>

<body>




    <?php

    /*if ($page->views) {

        $content = '<div id="test">';
        $contentView = '';
        $out = '';

        foreach ($page->views as $view) {

            $pageTemplate = $view->template;
            $id = $view->name;

            $colSize = $view->column_size;
            $gridCount = $colSize;

            switch ($pageTemplate) {
                case 'copy':
                    $copy = $view->body;
                    $out .= "<div class=\"{$gridCount}\">";
                    $out .= $copy;
                    $out .= checkGrid($gridCount);
                    $out .= '</div>';
                    $contentView .= '';
                    echo $out;

                    break;

                default:
                    # code...
                    break;
            }
        } //end view }*/    ?>

        <div id="ca-container">
    <!-- if page jhas views -->
    <?php if ($page->views) : ?>
        <?php foreach ($page->views as $view) : ?>

            <div class="section">

                <?php if ($view->body) : ?>
                    <div class="column">
                        <?php echo $view->body; ?>
                    </div>
                <?php endif; ?>

            </div>



        <?php endforeach; ?>
    <?php endif; ?>

    </div>




















    <!--<div class="5">
        <p>Donec ullamcorper nulla non metus auctor fringilla. Maecenas faucibus mollis interdum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sem malesuada magna mollis euismod. Etiam porta sem malesuada magna mollis euismod. Curabitur blandit tempus porttitor. Maecenas sed diam eget risus varius blandit sit amet non magna. Etiam porta sem malesuada magna mollis euismod. Nulla vitae elit libero, a pharetra augue. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Vestibulum id ligula porta felis euismod semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
        <div class='uk-clearfix uk-visible-small'></div>
    </div>
    <div class="5">
        <p>Donec ullamcorper nulla non metus auctor fringilla. Maecenas faucibus mollis interdum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sem malesuada magna mollis euismod. Etiam porta sem malesuada magna mollis euismod. Curabitur blandit tempus porttitor. Maecenas sed diam eget risus varius blandit sit amet non magna. Etiam porta sem malesuada magna mollis euismod. Nulla vitae elit libero, a pharetra augue. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Vestibulum id ligula porta felis euismod semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
        <div class='uk-clearfix uk-visible-small'></div>
    </div>
    <div class="6">
        <p>Sed posuere consectetur est at lobortis. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Vestibulum id ligula porta felis euismod semper. Donec id elit non mi porta gravida at eget metus. Vestibulum id ligula porta felis euismod semper. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec ullamcorper nulla non metus auctor fringilla. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Sed posuere consectetur est at lobortis. Donec id elit non mi porta gravida at eget metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ullamcorper nulla non metus auctor fringilla. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        <div class='uk-clearfix uk-visible-small'></div>
    </div> -->


























    <script src="" async defer></script>
</body>

</html>