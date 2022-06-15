<?php

use Slim\App;
//use GuzzleHttp\Client;

return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class)->setName('home');    

    $app->get('/power-middleware/rest/{subpath}[/{id}]', \App\Action\PowerMiddleware\PowerMiddlewareGetAction::class)
        ->setName('power-middleware');
};