<?php namespace ProcessWire; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title><?php echo $page->title; ?></title>
	<link rel="stylesheet" type="text/css" media="all" href="https://the-chumney.github.io/grid/css/compiled/cagrid.css"/>
	<link rel="stylesheet" type="text/css" href="<?= $config->urls->templates?>styles/specials.css" />
</head>
<body>




<div class="dev">
    <?php
	/*$count = -1;

	foreach($page->images as $photo) {
		echo "<li uk-slideshow-item='{$count}'><a href='#'><img src='{$photo->size(150,100)->url}'  alt=''></a></li>";
		$count++;
    }*/
    
    //echo 'hel';
    
    //bd($modules->isInstalled('FormTemplateProcessor'));
	?>

    <form id="ca-form">
        <?= $page->form_select; ?>
    
    
    </form>



</div>














<div id="ca-specials" class="ca-container">


<?php





















/*$stefan = new person());
$jimmy = new person;

$stefan->set_name("Stefan Mischook");
$jimmy->set_name("Nick Waddles");

echo "Stefan's full name: " . $stefan->get_name();
echo "Nick's full name: " . $jimmy->get_name();

$stefan = new person("Stefan Mischook");
echo "Stefan's full name: ".$stefan->get_name();
*/






?>


</div>


<!--https://domain.com/?title=title&intent=intent&cookie=cookie&width=width&color=color&opacity=opacity&transition=transition



$parentTitle = strtolower($page->parent->parent->parent->title);
$currentTitle = strtolower($page->parent->name);
$currentName = $page->parent->name;
$combinedTitle = $parentTitle . "." . $currentTitle;
$randomNumber = generateRandomString();


$modalIntent = $page->parent->modal_intent->title;
$modalCookie = $page->parent->modal_cookie;
$modalTitle = $page->parent->modal_title;
$modalSubTitle = $page->parent->modal_subtitle;
$modalWidth = $page->parent->modal_width;
$modalHeaderColor = $page->parent->client_color->value;
$modalIncludeCloseButton = $page->parent->modal_close_button->value;
$modalOverlayInclude = $page->parent->modal_overlay->value;
$modalOverlayColor = $page->parent->modal_overlay_color->value;
$modalOverlayOpacity = $page->parent->modal_overlay_opacity->title;
$modalOverlayClose = $page->parent->modal_overlay_close->value;
$modalTransition = $page->parent->modal_transition->title;-->



<script type="text/javascript" src="https://theautohost.com/projects/chatus/dist/js/jquery.js"></script>

<script type="text/javascript">
    var jsonObj = [];
        $(":input").each(function(){
            var key = $(this).attr('name');
            var val = $(this).val();
            item = {}
            item [key] = val;

            jsonObj.push(item);
        });
        console.log(jsonObj);

    var data = $('#ca-form').serialize();
    console.log(data);


</script>


</body>
</html>


