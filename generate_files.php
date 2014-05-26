#!/usr/bin/env php
<?php
namespace l10n;

// Script should not be called from the Web
if (php_sapi_name() != 'cli') {
    die('Nope');
}

include __DIR__ .'/config.php';

$worldcup    = new Dotlang();
$fennec_feed = new Dotlang();

// the templates for properties as closures using the worldcup/fennec_feed objects
include __DIR__ .'/templates.php';

$desc_worldcup = $desc_fennec = '';

foreach ($locales as $locale) {

    // World Cup
    $worldcup->load("locales/{$locale}/worldcup.lang");
    $properties_path = __DIR__ .'/worldcupfeed/locale/' . $locale .'/worldcupfeed.properties';
    if ($worldcup->fileTranslated()) {
        logger($locale . ': Worldcup Feed');
        fileForceContents($properties_path, $worldcup_properties_template());
        $desc_worldcup .= $worldcup_description_template($locale);

        // Update chrome.manifest
        updateManifestWithLocale(__DIR__ .'/worldcupfeed', 'worldcupfeed', $locale);
    }

    $worldcup->resetData();

    // Fennec Feeds
    $fennec_feed->load("locales/{$locale}/homefeeds.lang");
    $properties_path = __DIR__ .'/feed/locale/' . $locale .'/feeds.properties';
    if ($fennec_feed->fileTranslated()) {
        logger($locale . ': Fennec Feed');
        fileForceContents($properties_path, $fennec_feeds_properties_template());
        $desc_fennec .= $fennec_feeds_description_template($locale);

        // Update chrome.manifest
        updateManifestWithLocale(__DIR__ .'/feed', 'feeds', $locale);
    }

    $fennec_feed->resetData();
}

// World Cup
updateInstallRdf(
    __DIR__ .'/worldcupfeed/',
    '<em:creator>Margaret Leibovic</em:creator>',
    $desc_worldcup
);

// Fennec
updateInstallRdf(
    __DIR__ .'/feed/',
    '<em:creator>Margaret Leibovic and Michael Comella</em:creator>',
    $desc_fennec
);
