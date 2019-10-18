<?php namespace ProcessWire;

header('Content-Type: text/javascript');
/*
* Author: Louis Stephens
* Description: This is the loader for all scripts to create the modals
* Template: "Modal Launch"
* Date: 02/07/19
*/


// Used to enerate a random string for the cookies name
function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


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
$modalTransition = $page->parent->modal_transition->title;








include('./scripts/modals/basic-js-load.js');



if($page->parent->modal_intent->title == "exit") {
    include('./scripts/modals/modal-exit.js');
}
else {
    include('./scripts/modals/modal-entrance.js');
}



https://domain.com/


























?>