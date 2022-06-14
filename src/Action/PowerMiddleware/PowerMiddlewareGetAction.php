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
        $this->http_client = $http_client;
        $this->power_settings = $power_settings;
    }
    
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,        
        array $args
    ): ResponseInterface {        
        $subpath = $args['subpath'];
        $id = key_exists('id', $args) ? $args['id'] : false;
        $uri = $id ? $this->power_settings['base_url'] . $subpath . '/' . $id : $this->power_settings['base_url'] . $subpath;
        $headers = $request->getHeaders();
        $headers['api-key'][] = $this->power_settings['api_key'];
        //die(var_dump($headers));
        $client = new Client([
            'base_uri' => $this->power_settings['base_url'],
            'version' => 1.0]);

        $response = $client->get('/rest/public-pos/', [
            'headers' => [
                'api-key' => $this->power_settings['api_key']
                ]
            ]
        );

        //var_dump($response->getHeaderLine('transfer-encoding'));
        //die(var_dump($request));
        
        // $response = $this->http_client->request(
        //     $request->getMethod(),
        //     $uri,
        //     $headers,
        //         [
        //             'headers' => [
        //                 'api-key' => $this->power_settings['api_key'],                        
        //             ]
                    
        //         ]
        //     );
        //die($response->getContentLength());



// $curl = curl_init();

// curl_setopt_array($curl, array(
//   CURLOPT_URL => 'https://power.uni-foundation.eu/rest/institution-pos',
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => '',
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 0,
//   CURLOPT_FOLLOWLOCATION => true,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => 'GET',
//   CURLOPT_HTTPHEADER => array(
//     'api-key: 4b70912c65a52e5c602fb4120c2db349'
//   ),
// ));

// $response = curl_exec($curl);

// curl_close($curl);
//echo $response;

        //die(var_dump($response));

        return $response;
    }
}
