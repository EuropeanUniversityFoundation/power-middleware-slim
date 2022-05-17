<?php

namespace App\Action\Ecard;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class EcardRootAction
{
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        // Retrieve $data array.
        include(__DIR__ . '/../../../data/ecard/sho_spuc.inc');
        $known_sho = ["known_sho" => array_keys($data)];
        $response->getBody()->write(json_encode($known_sho));
        $response = $response->withHeader('Content-Type', 'application/json');
        return $response;
    }
}
