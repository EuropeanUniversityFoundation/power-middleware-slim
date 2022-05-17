<?php

namespace App\Action\Ecard;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class EcardEsiPostAction
{
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args
    ): ResponseInterface {
        $sho = $args['sho'];
        $params = (array)$request->getParsedBody();
        $spuc = ($params['spuc']) ? $params['spuc'] : $params['schac_personal_unique_code'];
        // Retrieve $data array.
        include(__DIR__ . '/../../../data/ecard/sho_spuc.inc');
        if (array_key_exists($sho, $data)) {
            $entity_type = array_key_last($data[$sho]['request']['syntax']);
            $entity_code = $data[$sho]['request']['syntax'][$entity_type];
            $spuc_parts = explode(':', $spuc);
            // Validate format urn:schac:personalUniqueCode:int:esi:<sHO>:<code>
            if (
                (sizeof($spuc_parts) != 7) ||
                ($spuc_parts[0] != 'urn') ||
                ($spuc_parts[1] != 'schac') ||
                ($spuc_parts[2] != 'personalUniqueCode') ||
                ($spuc_parts[3] != 'int') ||
                ($spuc_parts[4] != 'esi')
            ) {
                $err = ['error' => ' invalid_request',
                'error_description' => 'Invalid Personal Unique Code: ' . $spuc];
                $response = $response->withStatus(400);
                $response->getBody()->write(json_encode($err));
            }
            elseif ($spuc_parts[5] != $entity_code) {
                $err = ['error' => ' invalid_request',
                'error_description' => 'Invalid value in param: ' . $entity_type . '.'];
                $response = $response->withStatus(400);
                $response->getBody()->write(json_encode($err));
            }
            else {
                $esi_code = $spuc_parts[6];
                $format = $data[$sho]['format'];
                $esi_data = ['format' => $format];
                if (array_key_exists('brand', $data[$sho])) {
                    $esi_data['brand'] = $data[$sho]['brand'];
                }
                $people = $data[$sho]['people'];
                if (array_key_exists($esi_code, $people)) {
                    if ($format == 'rendered') {
                        $image_path = __DIR__ . '/assets/ecard/rendered/';
                        $image_file = $image_path . $people[$esi_code]['img_src'];
                        $image_data = file_get_contents($image_file);
                        $base64 = base64_encode($image_data);
                        $esi_data['data'] = ['img' => $base64];
                    }
                    else {
                        $esi_data['data'] = $people[$esi_code];
                    }
                    $response->getBody()->write(json_encode($esi_data));
                }
                else {
                    $err = ['error' => ' not_found',
                    'error_description' => 'Unknown Personal Unique Code.'];
                    $response = $response->withStatus(404);
                    $response->getBody()->write(json_encode($err));
                }
            }
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
