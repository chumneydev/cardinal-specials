<?php
	namespace ProcessWire;
	header_remove("X-Frame-Options");
	header("Access-Control-Allow-Origin: *");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/main.css" />
</head>
<body>

<div class="container">

<!-----------------------------------------------
-
- Special Type
- Layout Selector
- Disclaimer with Special or at bottom 
-
------------------------------------------------>


<!-- Include Banner -->

<!-- Include Dealer Message -->

<!-- Include Commercial -->

<!-- Include Custom Buttons -->

<!-- Include Specials -->

<!-- Include Disclaimers -->

</div>

<script src="<?php echo $config->urls->templates; ?>scripts/fontawesome-all.min.js"></script>
<script src="<?php echo $config->urls->templates; ?>scripts/ajax-calls.js"></script>
</body>
</html>