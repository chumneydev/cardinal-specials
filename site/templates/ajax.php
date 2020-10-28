<?php
    namespace ProcessWire;
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');

    
    
    if($input->urlSegment == 'process-offer'){

        $mail = wireMail();
        $fullName = $sanitizer->text($_POST['fullname']);
        $email = $sanitizer->text($_POST['email']);
        $phone = $sanitizer->text($_POST['phone']);
        $comments = $sanitizer->text($_POST['comments']);
    
        $subject = "Chumney & Associates";
        $dealerAddress = $sanitizer->text($_POST['crmEmail']);
        $redirectUrl = $sanitizer->text($_POST['redirectUrl']);
        $textBody = "
            <?XML VERSION=\"1.0\" encoding=\"UTF-8\"?>
            <?ADF VERSION=\"1.0\"?>
            <adf>
                <prospect>
                    <customer>
                        <contact>
                            <name part=\"full\">$fullName</name>
                            <email>$email</email>
                            <phone>$phone</phone>
                            <comments>$comments</comments>
                        </contact>
                    </customer>
                </prospect>

                <vendor>
                    <vendorname>Toyota of Greer</vendorname>
                </vendor>

            <provider>
                <name part=\"full\">Chumney & Associates</name>
                <url>http://www.chumneyads.com</url>
            </provider>
        </adf>";
    
        $options = array(
            'sendSingle' => true,
        );

        $numSent = wireMail($dealerAddress, '', $subject, $textBody, $options);
        if($numSent) {
            $redirect = "";
            $redirect .= "<script type=\"text/javascript\">";
            $redirect .= "top.window.location = '{$redirectUrl}';";
            $redirect .= "</script>";
            echo $redirect;

        }
    
    }





/*if($input->urlSegment == 'get-clients'){
    
    $clients = $pages->find("template=clients");
    $client_array = array();

    foreach($clients as $client){
        $name = $client->id;
        $title = $client->title;
        $clientName = $client->client_name;
        $clientColor = $client->client_color;
        $assigned = $client->assigned_to;


        $events_array[] = array(
            'id' => $id,
            'code' => $title,
            'name' => $clientName,
            'client' => $clientColor,
            'dmp rep' => $assigned,
        );







    }


}





$events = $pages->find("template=modals,name!=modals");
$events_array = array();

foreach ($events as $event) {

    $grandParent = $event->parent->parent->name;
    $name = $event->name;
    $title = $event->title;

    $modalIntent = $event->modal_intent->title;
    $modalCookie = $event->modal_cookie;
    $modalTitle = $event->modal_title;
    $modalSubTitle = $event->modal_subtitle;
    $modalWidth = $event->modal_width;
    $modalHeaderColor = $event->client_color->value;
    $modalIncludeCloseButton = $event->modal_close_button->value;
    $modalOverlayInclude = $event->modal_overlay->value;
    $modalOverlayColor = $event->modal_overlay_color->value;
    $modalOverlayOpacity = $event->modal_overlay_opacity->title;
    $modalOverlayClose = $event->modal_overlay_close->value;



    $events_array[] = array(
        'client' => $grandParent,
        'name' => $name,
        'title' => $title,
        'modal_intent' => $modalIntent,
        'modal_cookie' => $modalCookie,
        'modal_title' => $modalTitle,
        'modal_subtitle' => $modalSubTitle,
        'modal_width' => $modalWidth,
        'modal_header_color' => $modalHeaderColor,
        'modal_close_button' => $modalIncludeCloseButton,
        'modal_overlay' => $modalOverlayInclude,
        'modal_overlay_color' => $modalOverlayColor,
        'modal_overlay_opacity' => $modalOverlayOpacity,
        'modal_overlay_close' => $modalOverlayClose,
    );
}

$events_json = json_encode($events_array, true);
echo $events_json;*/


/*$query = [
    'title',
    'basic-page' => [
        'title',
        'modals' => [
            'title',
            'dev_ref' => [
                'name'
            ],
            'modal_width',
            'modal_title',
            'modal_subtitle'
        ],
        'specials' => [
            'title',
            'client_color',
            'modal_intent',
            'modal_width',
            'modal_cookie',
            'modal_title',
            'modal_subtitle',
            'modal_overlay',
            'modal_overlay_color',
            'modal_overlay_opacity',
            'modal_overlay_close',
            'modal_close_button',
            'modal_transition',
        ]


    ],
];

$parentId = 1;
$test = $pages->find('template=clients')->pageQueryJson($query);
echo $test;*/

/*$parts = parse_url($url);
parse_str($parts['query'], $query);
echo $query['email'];





if($input->urlSegment == 'render-specials'){
    $query = [
    	'title' => function($parent) {
            $clients = $parent->find('template=clients');
            return $clients->pageQueryArray(['title']);
        }


    ];

     $test = $pages->find('template=holding,include=hidden')->pageQueryJson($query);
     echo $test;
}*/



/*$events = $pages->find("template=clients,");
$events_array = array();

foreach ($events as $event) {

    $start = "" . date(strtotime($event->startTime)) . "";
    $title = $event->title;

    $events_array[] = array(
        'title' => $title,
        'date' => $start
    );
}

$events_json = json_encode($events_array, true);
echo $events_json;*/



/*$clientArray = array();
$clients = $pages->find("template=clients, sort=sort");

foreach($clients as $client) {
    $title = $client->title;
    $clientArray[] = array(
        'title' => $title,
        'title' => $title
    );
}

    $client_json = json_encode( $clientArray, true);
    echo $client_json; */





/*foreach ($programmes as $programme) {
    $title = $programme->title;
    $url = $programme->url;
    $summary = $programme->programme_summary;
    $image = $programme->programme_venue_image->url;
    $long = $programme->programme_location->lng;
    $lat = $programme->programme_location->lat;
    $programme_array[] = array(
        'type' => 'Feature',
        'geometry' => array(
            'type' => 'Point',
            'coordinates' => [$long, $lat]
        ),
        'properties' => array(
            'title' => $title,
            'description' => $summary,
            'image' => $image,
            'url' => $url,
            "marker-symbol" => "music"
        ),
    );
}
$programme_json = json_encode($programme_array, true);
*/


 





?>