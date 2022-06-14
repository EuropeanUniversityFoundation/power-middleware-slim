<?php

namespace App\Action\PowerMiddleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use GuzzleHttp\Client;

final class PowerMiddlewareGetAction {

    private $http_client;

    private $power_settings;
    
    public function __construct(
        Client $http_client
    )
    {
        require __DIR__ . '/../../../power_settings.php';        
        $this->power_settings = $power_settings;
    }
    
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,        
        array $args
    ): ResponseInterface {        
        $subpath = $args['subpath'];
        $subpath = '/rest/' . $subpath;
        $id = key_exists('id', $args) ? $args['id'] : false;
        $uri = $id ? $subpath . '/' . $id : $subpath;
        $client = new Client([
            'base_uri' => $this->power_settings['base_url'],
            'version' => 1.0]);

        $response = $client->get($uri, [
            'headers' => [
                'api-key' => $this->power_settings['api_key']
                ]
            ]
        );

        return $response;
    }
}
