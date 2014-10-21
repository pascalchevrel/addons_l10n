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
$privacy_coach_properties = new Dotlang();
$privacy_coach_dtd = new Dotlang();

// the templates for properties as closures using the  privacy_coach object
include __DIR__ .'/templates.php';

$desc_worldcup = $desc_fennec = $desc_privacycoach = '';

/*
foreach ($addons as $addon_name => $addon_details) {
    $properties_path = __DIR__ . "/addons/worldcupfeed/locale/{$locale}/{$addon_details[2]}";
    foreach ($addon_details[1] as $locale) {
        $lang_file_path = __DIR__ .  "locales/{$locale}/{$addon_details[0]}";
        $worldcup->load($path);
        if ($worldcup->fileTranslated()) {
            logger($locale . ': Worldcup Feed');
            fileForceContents($properties_path, $worldcup_properties_template());
            $desc_worldcup .= $worldcup_description_template($locale);

            // Update chrome.manifest
            updateManifestWithLocale(__DIR__ .'/addons/worldcupfeed', 'worldcupfeed', $locale);
        }
    }
}
*/
$desc_privacy_coach = '';

foreach ($locales as $locale) {

    // // World Cup
    // $path = "locales/{$locale}/worldcup.lang";
    // $worldcup->load($path);
    // $properties_path = __DIR__ .'/addons/worldcupfeed/locale/' . $locale .'/worldcupfeed.properties';
    // if ($worldcup->fileTranslated()) {
    //     logger($locale . ': Worldcup Feed');
    //     fileForceContents($properties_path, $worldcup_properties_template());
    //     $desc_worldcup .= $worldcup_description_template($locale);

    //     // Update chrome.manifest
    //     updateManifestWithLocale(__DIR__ .'/addons/worldcupfeed', 'worldcupfeed', $locale);
    // }

    // $worldcup->resetData();

    // Pricacy Coach
    $privacy_coach_properties->load("locales/{$locale}/privacycoach_properties.lang");
    $properties_path = __DIR__ .'/addons/privacy-coach/locale/' . $locale .'/privacycoach.properties';
    if ($privacy_coach_properties->fileTranslated()) {
        logger($locale . ': privacy coach properties file');
        fileForceContents($properties_path, $privacy_coach_properties_template());
        $desc_privacy_coach .= $privacy_coach_description_template($locale);

        // Update chrome.manifest
        updateManifestWithLocale(__DIR__ .'/addons/privacy-coach', 'privacy-coach', $locale);
    }

    $privacy_coach_properties->resetData();

    $privacy_coach_dtd->load("locales/{$locale}/privacycoach_dtd.lang");
    $dtd_path = __DIR__ .'/addons/privacy-coach/locale/' . $locale .'/privacycoach.dtd';
    if ($privacy_coach_dtd->fileTranslated()) {
        logger($locale . ': privacy coach dtd file');
        fileForceContents($dtd_path, $privacy_coach_dtd_template());
    }

    $privacy_coach_properties->resetData();
}

// // World Cup
// updateInstallRdf(
//     __DIR__ .'/addons/worldcupfeed/',
//     '<em:creator>Margaret Leibovic</em:creator>',
//     $desc_worldcup
// );

// // Fennec
// updateInstallRdf(
//     __DIR__ .'/addons/feed/',
//     '<em:creator>Margaret Leibovic and Michael Comella</em:creator>',
//     $desc_fennec
// );

// Privacy coach
updateInstallRdf(
    __DIR__ .'/addons/privacy-coach/',
    '<em:creator>Margaret Leibovic</em:creator>',
    $desc_privacy_coach
);
