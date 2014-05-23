<?php
namespace l10n;
// Script should not be called from the Web
if (php_sapi_name() != 'cli') {
    die('Nope');
}

date_default_timezone_set('Europe/Paris');
require_once __DIR__ . '/vendor/autoload.php';
include __DIR__ .'/functions.php';

$worldcup    = new Dotlang();
$fennec_feed = new Dotlang();

// the templates for properties as closures using the worldcup object
include __DIR__ .'/templates.php';

$locales = ['de', 'es-ES', 'fr', 'id', 'it', 'pt-BR'];
$desc_worldcup = $desc_fennec = '';

foreach ($locales as $locale) {

    // World Cup
    $worldcup->load("locales/{$locale}/worldcup.lang");
    $properties_path = __DIR__ .'/world-cup-feed/locale/' . $locale .'/worldcupfeed.properties';
    if ($worldcup->fileTranslated()) {
        logger($locale . ': worldcup');
        fileForceContents($properties_path, $worldcup_properties_template());
        $desc_worldcup .= $worldcup_description_template($locale);
    }

    $worldcup->resetData();

    // Fennec Feeds
    $fennec_feed->load("locales/{$locale}/homefeeds.lang");
    $properties_path = __DIR__ .'/fennec_rss/locale/' . $locale .'/feeds.properties';
    if ($fennec_feed->fileTranslated()) {
        logger($locale . ': Fennec Feed');
        fileForceContents($properties_path, $fennec_feeds_properties_template());
        $desc_fennec .= $fennec_feeds_description_template($locale);
    }

    $fennec_feed->resetData();
}

// World Cup
updateInstallRdf(
    __DIR__ .'/world-cup-feed/',
    '<em:creator>Margaret Leibovic</em:creator>',
    $desc_worldcup
);

// Fennec
updateInstallRdf(
    __DIR__ .'/fennec_rss/',
    '<em:creator>Margaret Leibovic and Michael Comella</em:creator>',
    $desc_fennec
);
