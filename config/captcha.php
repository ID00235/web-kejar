<?php

return [

    'characters' => 'A9B8C7D6E5F4H3K2L1M9N8P7R6T5V4W3X2Y1Z0',

    'default'   => [
        'length'    => 5,
        'width'     => 120,
        'height'    => 36,
        'quality'   => 90,
    ],

    'flat'   => [
        'length'    => 5,
        'width'     => 90,
        'height'    => 30,
        'quality'   => 90,
        'lines'     => -1,
        'bgImage'   => false,
        'bgColor'   => '#ffffff',
        'fontColors'=> ['#000000', '#000000', '#000000', '#000000', '#000000', '#000000', '#000000', '#000000'],
        'contrast'  => -5,
    ],

    'mini'   => [
        'length'    => 4,
        'width'     => 60,
        'height'    => 32,
    ],

    'inverse'   => [
        'length'    => 5,
        'width'     => 120,
        'height'    => 36,
        'quality'   => 90,
        'sensitive' => true,
        'angle'     => 12,
        'sharpen'   => 10,
        'blur'      => 2,
        'invert'    => true,
        'contrast'  => -5,
    ]

];
