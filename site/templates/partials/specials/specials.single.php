<?php
	namespace ProcessWire;
	header_remove("X-Frame-Options");
	header("Access-Control-Allow-Origin: *");
?>



<div class="ca-row">

<?php foreach($page->specials as $content): ?>
    <?php
        $todaysDate = date("F j, Y g:i a");
        $convertedTodaysDate = strtotime($todaysDate);

        $startDate = $content->specials_start_date;
        $convertedStartDate = strtotime($startDate);

        $endDate = $content->specials_end_date;
        $convertedEndDate = strtotime($endDate);
    ?>

	<?php if ($convertedStartDate <= $convertedTodaysDate && $convertedTodaysDate < $convertedEndDate): ?>
        <div class="ca-col-12">
            <div class="special cacoupon<?=$cacoupon; ?>">
                <a href="<?=$content->specials_url; ?>" class="counter" data-parent="<?=$parentPage;?>" data-repeater="<?=$content->id;?>"><img src="<?=$content->specials_image->url; ?>" alt="<?=$content->specials_image->description; ?>" class="ca-image"/></a>
            
            <?php
	            $buttons = $content->specials_buttons;
	            $count = count($buttons);
	            //echo $count;
                if ($count == 1) {
                $class = 12;
                }else if ($count == 2) {
		            $class = 6;
	            } else if ($count == 3) {
		            $class = 4;
	            } else if ($count == 4) {
		            $class = 3;
	            }
            	else {}
            ?>
            <div class="ca-row">
                <?php foreach($content->specials_buttons as $button): ?>

                    <?php

                    $test =  $button->parent->id;
                    //echo "onclick=\"printJS({printable: '{$button}', type: 'image'});\"";
                    echo "<h1>" . $test . "</h1>";

                    ?>


                    <?php if($button->specials_button_select->title === "Print"): ?>
                        <div class="ca-col-<?=$class;?>"><a href="#" <?=$button->specials_button_url;?> class="ca-btn-demo"><?=$button->specials_button_select->title;?></a></div>

                    <?php else: ?>
                        <div class="ca-col-<?=$class;?>"><a href="<?=$button->specials_button_url;?>" class="ca-btn-demo"><?=$button->specials_button_select->title;?></a></div>
                    <?php endif; ?>


                <?php endforeach; ?>
            </div>
        </div>
    </div>

	   <?php elseif ($convertedStartDate > $convertedTodaysDate): ?>
            <div class="ca-col-6">
            <p>The start date was set to <span><?=$startDate; ?>, and your special has not yet started.</p>
            </div>


        <?php elseif ($convertedTodaysDate >= $convertedEndDate): ?>
            <div class="ca-col-6">
            <p>The start date was set to <span><?=$startDate; ?>, and your special has not yet started.</p>
            <p>The expiration date was set to <span><?=$endDate; ?>, and your special has expired.</p>
            </div>



        <?php endif; ?>

        <?php $cacoupon++; ?>
        <?php endforeach; ?>


</div>

<!-- Begin Specials -->
