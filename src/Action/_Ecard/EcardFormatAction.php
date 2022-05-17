<?php

namespace App\Action\Ecard;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class EcardFormatAction
{
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args
    ): ResponseInterface {
        $sho = $args['sho'];
        // Retrieve $data array.
        include(__DIR__ . '/../../../data/ecard/sho_spuc.inc');
        if (array_key_exists($sho, $data)) {
            $spec = [
                'request' => $data[$sho]['request'],
                'format' => $data[$sho]['format'],
                'fields' => $data[$sho]['fields'],
            ];
            if (array_key_exists('brand', $data[$sho])) {
                $spec['brand'] = $data[$sho]['brand'];
            }
            $response->getBody()->write(json_encode($spec));
        }
        else {
            $err = ['error' => ' not_found',
            'error_description' => 'Unknown Home Organization code.'];
            $response = $response->withStatus(404);
            $response->getBody()->write(json_encode($err));
        }
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response;
    }
}
