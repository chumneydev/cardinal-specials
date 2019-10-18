<?php namespace ProcessWire; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title><?= $page->title; ?></title>
	<link rel="stylesheet" type="text/css" media="all" href="https://the-chumney.github.io/grid/css/compiled/cagrid.css"/>
	<link rel="stylesheet" type="text/css" href="<?= $config->urls->templates?>styles/specials.css" />
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-6jHF7Z3XI3fF4XZixAuSu0gGKrXwoX/w3uFPxC56OtjChio7wtTGJWRW53Nhx6Ev" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?= $config->urls->templates?>styles/specials.css" />

</head>
<body>

<div id="ca-specials" class="ca-container">



<div class="ca-row">
	<?php foreach($page->special_custom_buttons as $button): ?>
		<?php
		$clientColor = $page->parent->parent->client_color->title;
		$countButtons = count($page->special_custom_buttons->find('special_custom_buttons_include=0'));

		?>

		<!-- Check CTA Buttons Include-->
		<?php if(!$button->special_custom_buttons_include): ?>


				<?php if($countButtons == 2): ?>
					<div class="ca-col-6">
						<a href="<?= $button->special_custom_buttons_url; ?>" class="ca-btn-<?= $clientColor; ?>" target="_top"><?= $button->special_custom_buttons_text; ?></a>
					</div>
				<?php elseif($countButtons == 3): ?>
					<div class="ca-col-4">
						<a href="<?= $button->special_custom_buttons_url; ?>" class="ca-btn-<?= $clientColor; ?>" target="_top"><?= $button->special_custom_buttons_text; ?></a>
					</div>
				<?php elseif($countButtons == 4): ?>
					<div class="ca-col-3">
						<a href="<?= $button->special_custom_buttons_url; ?>" class="ca-btn-<?= $clientColor; ?>" target="_top"><?= $button->special_custom_buttons_text; ?></a>
					</div>

				<?php endif; ?>


		<?php endif; ?>


	<?php endforeach; ?>
	<!-- End Dynamic CTA Buttons -->
</div>




	<!-- Dynamic Button Row/Grid -->
	<?php foreach ($page->specials as $special): ?>


	<?php

		$startDate = $special->special_start_date;
		$convertedStartDate = strtotime($startDate);
		$expirationDate = $special->special_end_date;
		$convertedExpirationDate = strtotime($expirationDate);

		if($convertedStartDate <= $convertedToday && $convertedStartDate < $convertedExpirationDate && $convertedToday < $convertedExpirationDate) {
			include("./partials/specials/service.inc.php");
		}



	?>







	<?php endforeach; ?>



<script src="<?php echo $config->urls->templates; ?>scripts/jquery.js"></script>
<script src="<?php echo $config->urls->templates; ?>scripts/all.min.js"></script>
<script src="<?php echo $config->urls->templates; ?>scripts/print.min.js"></script>



</body>
</html>


