<?php

use Slim\App;
use Slim\Views\Twig;

return function (App $app) {
    $app->get('/', function ($request, $response, $args) {
        $view = Twig::fromRequest($request);
        return $view->render($response, 'index.html');
    })->setName('root');

    $app->get('/rest/{subpath}[/{id}]', \App\Action\PowerMiddleware\PowerMiddlewareGetAction::class)
        ->setName('power-middleware');
};
