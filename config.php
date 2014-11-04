<?php

date_default_timezone_set('Europe/Paris');

include __DIR__ . '/functions.php';
require_once __DIR__ . '/vendor/autoload.php';

// Path to local clone of http://svn.mozilla.org/projects/l10n-misc/trunk/add-ons/
define('SVN_LOCALES', realpath(__DIR__ . '/locales/'));

// Path to local clone of your fork of https://github.com/leibovic/privacy-coach
define('PRIVACY_COACH', realpath(__DIR__ . '/addons/privacy-coach/'));

$locales = ['cs', 'de', 'es-ES', 'es-MX', 'fr', 'hu', 'id', 'ja', 'pl', 'pt-BR', 'ru', 'sq', 'zh-TW'];
