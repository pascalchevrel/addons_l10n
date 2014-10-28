#!/usr/bin/env php
<?php
namespace l10n;

// Script should not be called from the Web
if (php_sapi_name() != 'cli') {
    die('Nope');
}

include __DIR__ . '/config.php';

$privacy_coach = new Dotlang();

// The templates for properties as closures using the  privacy_coach object
include __DIR__ . '/templates.php';


$desc_privacy_coach = '';

foreach ($locales as $locale) {

    $privacy_coach->load("locales/{$locale}/privacycoach.lang");
    $properties_path = __DIR__ .'/addons/privacy-coach/locale/' . $locale .'/privacycoach.properties';
    $dtd_path = __DIR__ .'/addons/privacy-coach/locale/' . $locale .'/privacycoach.dtd';

    if ($privacy_coach->fileTranslated()) {
        logger($locale . ': privacy coach properties file');
        fileForceContents($properties_path, $privacy_coach_properties_template());

        logger($locale . ': privacy coach dtd file');
        fileForceContents($dtd_path, $privacy_coach_dtd_template());

        // Prepare updated install.rdf file
        $desc_privacy_coach .= $privacy_coach_description_template($locale);

        // Update chrome.manifest file
        updateManifestWithLocale(__DIR__ .'/addons/privacy-coach', 'privacycoach', $locale);
    }

    // Reset all strings before looping through the next locale
    $privacy_coach->resetData();
}

// Update install.rdf with the list of locales ready
updateInstallRdf(
    __DIR__ .'/addons/privacy-coach/',
    '<em:creator>Margaret Leibovic</em:creator>',
    $desc_privacy_coach
);
