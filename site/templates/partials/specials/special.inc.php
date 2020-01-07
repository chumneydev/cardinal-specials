<?php
    namespace ProcessWire;
?>

<div class="column">

    <section class="nested">
        <div class="column">
            <div class="ca-print">
                <img src="<?= $special->special_image->httpUrl; ?>" class="ca-print-image ca-image" />
                <div class="ca-print-icon">
                    <i class="ca-<?= $clientColor; ?> far fa-print" onClick="printJS({printable: '<?= $special->special_image->httpUrl; ?>', type: 'image'})"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Begin Custom CTA Buttons for Specials -->
    <section class="nested">
        <?php if ($buttonsIncluded) : ?>
            <?php foreach ($buttonsIncluded as $button) : ?>
                <div class="column">
                    <a href="<?= $button->special_custom_buttons_url; ?>" class="btn <?= $clientColor; ?>" target="_top"><?= $button->special_custom_buttons_text; ?></a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <div class="column">
            <a href="<?= $special->special_url; ?>" class="btn <?= $clientColor; ?>" target="_top">View Inventory</a>
        </div>
        <!-- End Dynamic CTA Buttons -->
    </section>

    <!-- if Disclaimer exists -->
    <?php if ($special->special_disclaimer) : ?>
        <section>
            <div class="column">
                <p class="disclaimer"><?= $special->special_disclaimer; ?></p>
            </div>
        </section>

    <?php endif; ?>
</div>
