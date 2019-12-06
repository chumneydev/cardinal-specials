<?php namespace ProcessWire;

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
            "color" => $modal->client_color->title,
            "buttonText" => $modal->modal_button_text,
            "cookieAmount" => $modal->modal_cookie,
            "intent" => $modal->modal_intent->title,
            "includeOverlay" => $modal->modal_overlay->value,
            "title" => $modal->modal_title,
            "subTitle" => $modal->modal_subtitle,
            "closeOnOverlay" => $modal->modal_overlay_close->value,
            "OverlayColor" => $modal->modal_overlay_color->title,
            "width" => $modal->modal_width,
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