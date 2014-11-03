#!/usr/bin/env php
<?php
namespace l10n;

// Script should not be called from the Web
if (php_sapi_name() != 'cli') {
    die('Nope');
}

include __DIR__ . '/config.php';

print showExec('svn up ' . SVN_LOCALES, 'Update data from SVN');

print "--- Generate addon locales ---\n";

$privacy_coach = new Dotlang();

// The templates for properties as closures using the  privacy_coach object
include __DIR__ . '/templates.php';

$desc_privacy_coach = '';

foreach ($locales as $locale) {
    $privacy_coach->load(SVN_LOCALES . "/{$locale}/privacycoach.lang");
    $properties_path = PRIVACY_COACH . "/locale/{$locale}/privacycoach.properties";
    $dtd_path = PRIVACY_COACH . "/locale/{$locale}/privacycoach.dtd";

    if ($privacy_coach->fileTranslated()) {
        fileForceContents($properties_path, $privacy_coach_properties_template());
        logger($locale . ': privacy coach properties file generated');

        fileForceContents($dtd_path, $privacy_coach_dtd_template());
        logger($locale . ': privacy coach dtd file generated');

        // Prepare updated install.rdf file
        $desc_privacy_coach .= $privacy_coach_description_template($locale);

        // Update chrome.manifest file
        updateManifestWithLocale(PRIVACY_COACH, 'privacycoach', $locale);
        logger($locale . ' added to privacy coach manifest file');
    }

    // Reset all strings before looping through the next locale
    $privacy_coach->resetData();
}

// Update install.rdf with the list of locales ready
updateInstallRdf(
    PRIVACY_COACH,
    '<em:creator>Margaret Leibovic</em:creator>',
    $desc_privacy_coach
);

chdir(PRIVACY_COACH);
print showExec('git status', 'Generate locales for add-on');
