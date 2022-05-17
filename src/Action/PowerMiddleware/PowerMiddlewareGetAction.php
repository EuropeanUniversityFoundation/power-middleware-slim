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
        require __DIR__ . '/../../../config/power_settings.php';
        $this->http_client = $http_client;
        $this->power_settings = $power_settings;
    }
    
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,        
        array $args
    ): ResponseInterface {        
        $subpath = $args['subpath'];
        $uri = $this->power_settings['base_url'] . $subpath;

        $response = $this->http_client->request(
            $request->getMethod(),
            $uri,
                [
                    'headers' =>
                    [
                        'api-key' => $this->power_settings['api_key'],
                    ]
                ]
            );

        return $response;
    }
}
