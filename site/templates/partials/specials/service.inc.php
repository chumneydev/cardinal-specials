<?php namespace ProcessWire; ?>

<div class="ca-special"	>

	<div class="ca-row">
		<div class="ca-col-12">
			<div class="ca-print">
				<img src="<?= $special->special_image->httpUrl; ?>" class="ca-print-image ca-image"/>
				<div class="ca-print-icon">
					<i class="ca-<?= $clientColor; ?> far fa-print"  onClick="printJS({printable: '<?= $special->special_image->httpUrl; ?>', type: 'image'})"></i>
				</div<>
			</div>
		</div>
	</div>

	<!-- Begin Custom CTA Buttons for Specials -->
	<div class="ca-row ca-space">
		<?php if($buttonsIncluded): ?>
			<?php if($buttonsIncludedCountAdditional === 2): ?>
				<?php foreach($buttonsIncluded as $button): ?>
					<div class="ca-col-6">
						<a href="<?= $button->special_custom_buttons_url; ?>" class="ca-btn-<?= $clientColor; ?>" target="_top"><?= $button->special_custom_buttons_text; ?></a>
					</div>
				<?php endforeach; ?>

			<?php elseif($buttonsIncludedCountAdditional === 3): ?>
				<?php foreach($buttonsIncluded as $button): ?>
					<div class="ca-col-4">
						<a href="<?= $button->special_custom_buttons_url; ?>" class="ca-btn-<?= $clientColor; ?>" target="_top"><?= $button->special_custom_buttons_text; ?></a>
					</div>
				<?php endforeach; ?>

			<?php elseif($buttonsIncludedCountAdditional === 4): ?>
				<?php foreach($buttonsIncluded as $button): ?>
					<div class="ca-col-3">
						<a href="<?= $button->special_custom_buttons_url; ?>" class="ca-btn-<?= $clientColor; ?>" target="_top"><?= $button->special_custom_buttons_text; ?></a>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>

			<div class="ca-col-<?= $buttonCalculateRemainder; ?>">
				<a href="<?= $special->special_url; ?>" class="ca-btn-<?= $clientColor; ?>" target="_top">View Inventory</a>
			</div>



				<?php endif; ?>

			<!-- End Dynamic CTA Buttons -->
		</div>

		<!-- if Disclaimer exists -->
		<?php if($special->special_disclaimer): ?>
			<div class="ca-row">
				<div class="ca-col-12">
					<p class="ca-font-disclaimer"><?= $special->special_disclaimer; ?></p>
				</div>
			</div>
		<?php endif; ?>

</div> <!-- End Special -->



<?php if ($page->service_grid_layout->title === "1"): ?>
<div class="ca-special">
	<div class="ca-row">
		<div class="ca-col-12">
		</div>
	</div>
</div>

<?php else if ($page->service_grid_layout->title === "2 x 2"): ?>

<?php else if ($page->service_grid_layout->title === "3 x 3"): ?>


<?php endif; ?>