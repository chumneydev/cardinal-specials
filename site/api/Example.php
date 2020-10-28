<?php namespace ProcessWire;

header_remove("X-Frame-Options");
header("Access-Control-Allow-Origin: *");

class Example
{ 
  public static function test () {
    return 'test successful';
  }


  public static function clients() {
    $response = new \StdClass();
    $response->clients = [];

    $clients = wire('pages')->find("template=clients");
    foreach ($clients as $client) {
        array_push($response->clients, [
            "id" => $client->id,
            "name" => $client->title,
            'manufacturer' => $client->client_color->title,
            'color' => $client->client_color->value,
        ]);
    }
    return $response;


  }


public static function getModal($data)
    {
        $data = RestApiHelper::checkAndSanitizeRequiredParameters($data, ['id|int']);

        $response = new \StdClass();
        $response->modal = [];
        $modal = wire('pages')->get($data->id);

        if (!$modal->id) throw new \Exception('Modal not found');
        array_push($response->modal, [
            "client" => $modal->parent->parent->name,
            "id" => $modal->id,
            "name" => $modal->name,
            "color" => $modal->client_color->value,
            "buttonText" => $modal->modal_button_text,
            "cookieAmount" => $modal->modal_cookie,
            "intent" => $modal->modal_intent->title,
            "includeOverlay" => $modal->modal_overlay->value,
            "title" => $modal->modal_title,
            "subTitle" => $modal->modal_subtitle,
            "closeOnOverlay" => $modal->modal_overlay_close->value,
            "OverlayColor" => $modal->modal_overlay_color->value,
            "overlayOpacity" => $modal->modal_overlay_opacity->title,
            "width" => $modal->modal_width,
            "content" => $modal->title,
            "url" => $modal->httpUrl,
            //"content" => $modal->views,
        ]);

        /*foreach($modal->views as $view) {
            array_push($response->modal, [
                'row' => $view->title,
            ]);
        }*/

        return $response;
    }


public static function getInsertOffer($data)
    {
        $data = RestApiHelper::checkAndSanitizeRequiredParameters($data, ['id|int']);

        $response = new \StdClass();
        $response->offer = [];
        $offer = wire('pages')->get($data->id);
        //echo $offer->special_image->first->url;

        if (!$offer->id) throw new \Exception('Offer not found');
        array_push($response->offer, [
            "client" => $offer->parent->parent->name,
            "clientId" => $offer->parent->parent->id,
            "email" => $offer->parent->parent->dealer_email,
            "redirect" => $offer->parent->parent->redirect_url,
            "id" => $offer->id,
            "providerName" =>  $offer->provider->title,
            "providerDiv" =>  $offer->provider->value,
            "providerNameMobile" =>  $offer->provider_mobile->title,
            "providerDivMobile" =>  $offer->provider_mobile->value,
            "name" => $offer->name,
            "title" => $offer->title,
            "color" => $offer->client_color->title,
            "start" => $offer->special_start_date,
            "end" => $offer->special_end_date,
            "img" => $offer->special_image->first->httpUrl,
            "body" => $offer->body,
            "disclaimer" => $offer->special_disclaimer,
            "buttonOne" => $offer->offer_button_text_one,
            "buttonOneUrl" => $offer->offer_button_url_one,
            "buttonTwo" => $offer->offer_button_text_two,
            "buttonTwoUrl" => $offer->offer_button_url_two,
            //"url" => $offer->httpUrl,
        ]);

        /*foreach($modal->views as $view) {
            array_push($response->modal, [
                'row' => $view->title,
            ]);
        }*/

        return $response;
    }












public static function getSpecial($data) {
    $data = RestApiHelper::checkAndSanitizeRequiredParameters($data, ['id|int']);

    $response = new \StdClass();
    $response->special = [];
    $special = wire('pages')->get($data->id);

    if (!$special->id) throw new \Exception('Special not found');
        array_push($response->special, [
            "id" => $special->id,
            "client" => $special->parent->parent->name,
            "name" => $special->title,
            "html" => $special->html,
        ]);

    return $response;

}


public static function getAllSpecials() {
    $response = new \StdClass();
    $response->specials = [];
    
    $specials = wire('pages')->find('template=specials');

    foreach ($specials as $special) {
        array_push($response->specials, [
                'id' => $special->id,
                'name' => $special->name,
                'title' => $special->title,
                'url' => $special->url,
                'client' => $special->parent->parent->name,
        ]);
    }
    return $response;

}





  public static function getAllUsers() {
    $response = new \StdClass();
    $response->users = [];

    foreach(wire('users') as $user) {
      array_push($response->users, [
        "id" => $user->id,
        "name" => $user->name
      ]);
    }

    return $response;
  }

  public static function getUser($data) {
    $data = RestApiHelper::checkAndSanitizeRequiredParameters($data, ['id|int']);

    $response = new \StdClass();
    $user = wire('users')->get($data->id);

    if(!$user->id) throw new \Exception('user not found');

    $response->id = $user->id;
    $response->name = $user->name;

    return $response;
  }
}