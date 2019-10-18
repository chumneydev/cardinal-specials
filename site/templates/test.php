<?php namespace ProcessWire;
header('Access-Control-Allow-Origin: *');


/*if($input->urlSegment == 'render-specials'){
    $query = [
    	'title' => function($parent) {
            $clients = $parent->find('template=clients');
            return $clients->pageQueryArray(['title']);
        }


    ];

     $test = $pages->find('template=holding,include=hidden')->pageQueryJson($query);
     echo $test;
}*/




if($config->ajax && $input->urlSegment1 == 'add-grape') {
    $grape = $pages->get("/ajax/");
    echo $grape->title;
    
    //$html = $sanitizer->text($_POST['htmldata']);
    bdump($html);
    //$css = $sanitizer->text($_POST['css']);
    $html = $input->post->html;
    $grape->setOutputFormatting(false);
    $grape->grape_code = $html;
    $grape->save();



}


if($input->urlSegment1 === 'clients') {


    /*$clients = $pages->find("template=clients");
    $client_array = array();

    foreach ($clients as $client) {
        $id = $client->id;
        $title = $client->title;
        $url = $client->url;
        $clientName = $client->client_name;
        $clientColor = $client->client_color->value;
        $assigned = $client->assigned_to->user_full_name;


        $client_array[] = array(
            'id' => $id,
            'code' => $title,
            'name' => $clientName,
            'color' => $clientColor,
            'dmp rep' => $assigned,
            'url' => $url
        );
    }


    $client_json = json_encode($client_array, true);
    echo $client_json;*/

    header('Content-Type: application/json');

$clients = $pages->find("template=clients");
$clientArray = array();

foreach ($clients as $client) {
        $id = $client->id;
        $title = $client->title;
        $url = $client->url;
        $clientName = $client->client_name;
        $clientColor = $client->client_color->value;
        $assigned = $client->assigned_to->user_full_name;



        $clientArray[] = array(
            'id' => $id,
            'code' => $title,
            'name' => $clientName,
            'color' => $clientColor,
            'dmp rep' => $assigned,
            'url' => $url
        );
    
    
    
            foreach($client->children as $child) {
                $test = $child->title;

                //array_push($clientArray, $test);
            }

    
    
    
    
    
    }


    echo json_encode(array("clients" => $clientArray));
}

?>
