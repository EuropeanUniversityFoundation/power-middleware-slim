<?php

use Slim\App;
//use GuzzleHttp\Client;

return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class)->setName('home');    

    $app->get('/power-middleware/{subpath}', \App\Action\PowerMiddleware\PowerMiddlewareGetAction::class)
        ->setName('power-middleware');      
};