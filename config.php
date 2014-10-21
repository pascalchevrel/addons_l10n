<?php

date_default_timezone_set('Europe/Paris');

include __DIR__ .'/functions.php';
require_once __DIR__ . '/vendor/autoload.php';

$locales = ['de', 'es-ES', 'fr', 'id', 'it', 'ja', 'pt-BR'];

$addons = [
    // 'worldcupfeed' => [
    //     'worldcup.lang',
    //     ['de', 'es-ES', 'fr', 'id', 'it', 'ja', 'pt-BR'],
    //     'worldcupfeed.properties'
    // ],
    // 'feeds' => [
    //     'homefeeds.lang',
    //     ['de', 'es-ES', 'fr', 'id', 'it', 'ja', 'pt-BR'],
    //     'feeds.properties'
    // ],
    'privacy-coach' => [
        'privacy_coach.lang',
        ['de', 'es-ES', 'fr', 'id', 'it', 'ja', 'pt-BR'],
        'privacycoach.properties'
    ],
];


// privacycoach.dtd

