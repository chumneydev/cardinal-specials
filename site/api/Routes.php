<?php namespace ProcessWire;

require_once wire('config')->paths->RestApi . "vendor/autoload.php";
require_once wire('config')->paths->RestApi . "RestApiHelper.php";

require_once __DIR__ . "/Example.php";

$routes = [
  ['OPTIONS', 'test', RestApiHelper::class, 'preflight', ['auth' => false]], // this is needed for CORS Requests
    ['GET', 'test', Example::class, 'test'],
    ['GET', 'clients', Example::class, 'clients'],

    'specials' => [
        ['OPTIONS', '', RestApiHelper::class, 'preflight', ['auth' => false]],
        ['GET', 'all', Example::class, 'getAllSpecials'],
        ['GET', '{id:\d+}', Example::class, 'getSpecial', ["auth" => false]], 

    ],
    'modals' => [
        ['OPTIONS', '', RestApiHelper::class, 'preflight', ['auth' => false]],
        ['GET', 'all', Example::class, 'getAllSpecials'],
        ['GET', '{id:\d+}', Example::class, 'getModal', ["auth" => false]],

    ],

    'users' => [
        ['OPTIONS', '', RestApiHelper::class, 'preflight', ['auth' => false]], // this is needed for CORS Requests
        ['GET', '', Example::class, 'getAllUsers', ["auth" => false]],
        ['GET', '{id:\d+}', Example::class, 'getUser', ["auth" => false]], // check: https://github.com/nikic/FastRoute
    ],
]; 