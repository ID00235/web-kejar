<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "PPID Kabupaten Batang Hari", // set false to total remove
            'description'  => 'Pejabat Pengelola Informasi dan Dokumentasi', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['PPID Batanghari, Batang Hari, Muara Bulian, Informasi, Publik, Dokumentasi'],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'PPID Kabupaten Batang Hari', // set false to total remove
            'description' => 'Pejabat Pengelola Informasi dan Dokumentasi', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => ['http://ppid.batangharikab.go.id/images/ppid-share.png'],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
          //'card'        => 'summary',
          //'site'        => '@LuizVinicius73',
        ],
    ],
];
