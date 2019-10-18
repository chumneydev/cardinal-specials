<?php
	namespace ProcessWire;
	header_remove("X-Frame-Options");
	header("Access-Control-Allow-Origin: *");
?>



<div class="ca-row">
	<div class="ca-col-10 ca-offset-1" style="border: 1px solid #f5f5f5;">
		<h2><?= $page->specials_expired_message ?></h2>
	</div>
</div>