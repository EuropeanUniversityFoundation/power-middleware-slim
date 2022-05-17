<?php

$data = [
    // Biciklistička akademija u Zagrebu
    'baz.hr' => [
        'request' => [
            'endpoint' => '/esi',
            'method' => 'POST',
            'params' => [
                'spuc' => '<sPUC>',
            ],
            'syntax' => [
                'sPUC' => 'urn:schac:personalUniqueCode:int:esi:<country-code>:<code>',
                'country-code' => 'HR',
            ],
        ],
        'format' => 'raw',
        'fields' => [
            'code' => 'string',
            'given_name' => 'string',
            'family_name' => 'string',
        ],
        'people' => [
            '24072013' => [
                'code' => '24072013',
                'given_name' => 'Ivan',
                'family_name' => 'Horvat',
            ],
        ],
    ],
    'hogwarts.zz' => [
        'request' => [
            'endpoint' => '/esi/<sPUC>',
            'method' => 'GET',
            'syntax' => [
                'sPUC' => 'urn:schac:personalUniqueCode:int:esi:<sHO>:<code>',
                'sHO' => 'hogwarts.zz',
            ],
        ],
        'format' => 'rendered',
        'fields' => [
            'img' => 'base64',
        ],
        'people' => [
            '123456789' => [
                'img_src' => 'gryffindor123456789.jpg',
            ],
        ],
    ],
    'hu-berlin.de' => [
        'request' => [
            'endpoint' => '/esi',
            'method' => 'POST',
            'params' => [
                'ESI' => '<sPUC>',
            ],
            'syntax' => [
                'sPUC' => 'urn:schac:personalUniqueCode:int:esi:<sHO>:<code>',
                'sHO' => 'hu-berlin.de',
            ],
        ],
        'format' => 'rendered',
        'fields' => [
            'img' => 'base64',
        ],
        'people' => [
            '12345' => [
                'img_src' => 'campuscard.svg',
            ],
        ],
    ],
    'kth.se' => [
        'request' => [
            'endpoint' => '/esi',
            'method' => 'POST',
            'params' => [
                'spuc' => '<sPUC>',
            ],
            'syntax' => [
                'sPUC' => 'urn:schac:personalUniqueCode:int:esi:<sHO>:<code>',
                'sHO' => 'kth.se',
            ],
        ],
        'format' => 'rendered',
        'fields' => [
            'img' => 'base64',
        ],
        'people' => [
            '12345' => [
                'img_src' => '324x204_eCard.png',
            ],
        ],
    ],
    'ua.pt' => [
        'request' => [
            'endpoint' => '/esi',
            'method' => 'POST',
            'params' => [
                'schac_personal_unique_code' => '<sPUC>',
            ],
            'syntax' => [
                'sPUC' => 'urn:schac:personalUniqueCode:int:esi:<sHO>:<code>',
                'sHO' => 'ua.pt',
            ],
        ],
        'format' => 'twig',
        'fields' => [
            'code' => 'string',
            'degree_prog' => 'string',
            'ounit_name' => 'string',
            'given_name' => 'string',
            'family_name' => 'string',
        ],
        'brand' => [
            'hei_name' => 'Universidade de Aveiro',
            'theme_color' => '#008800',
        ],
        'people' => [
            27885 => [
                'code' => '27885',
                'given_name' => 'Tiago',
                'family_name' => 'Simões',
                'degree_prog' => 'MIEF',
                'ounit_name' => 'Departamento de Física',
            ],
        ],
    ],
    'uni-foundation.eu' => [
        'request' => [
            'endpoint' => '/esi',
            'method' => 'POST',
            'params' => [
                'spuc' => '<sPUC>',
            ],
            'syntax' => [
                'sPUC' => 'urn:schac:personalUniqueCode:int:esi:<sHO>:<code>',
                'sHO' => 'uni-foundation.eu',
            ],
        ],
        'format' => 'raw',
        'fields' => [
            'code' => 'string',
            'given_name' => 'string',
            'family_name' => 'string',
        ],
        'people' => [
            '001' => [
                'code' => '001',
                'given_name' => 'T',
                'family_name' => 'S',
            ],
        ],
    ],
];
