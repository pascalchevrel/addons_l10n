<?php
namespace l10n;

$worldcup_properties_template = function() use($worldcup) {
    return <<<TEMPLATE
# Label for add-ons option to change the version of the feed that appears in the panel
feedEdition.label={$worldcup->getStringNoHTML('Select Country Edition')}

# Add-on option for international feed edition (contents in English)
feedEdition.international={$worldcup->getStringNoHTML('International (English)')}

# Link to help in add-on settings
settings.help={$worldcup->getStringNoHTML('Need help?')}

# Prompt that opens after installing feed
prompt.title={$worldcup->getStringNoHTML('Welcome to your Goal.com panel!')}
prompt.message={$worldcup->getStringNoHTML('Which edition would you like to follow?')}
prompt.ok={$worldcup->getStringNoHTML('OK')}

TEMPLATE;
};



$fennec_feeds_properties_template = function() use($fennec_feed) {
    return <<<TEMPLATE
# Label for page action item
pageAction.subscribeToPage={$fennec_feed->getStringNoHTML('Subscribe to page')}

# Title for subscribe prompt
prompt.subscribeWith={$fennec_feed->getStringNoHTML('Subscribe with')}

# Option added to subscribe prompt
prompt.firefoxHomepage={$fennec_feed->getStringNoHTML('Firefox homepage')}

# Toast notification that appears after the "Firefox homepage" option is selected
toast.addedToFirefoxHomepage={$fennec_feed->getStringNoHTML('Added to Firefox homepage')}

TEMPLATE;
};

$worldcup_description_template = function($locale) use($worldcup) {
    $l10n_desc = <<<TEMPLATE

        <em:localized>
          <Description>
            <em:locale>{$locale}</em:locale>
            <em:name>Goal.com Feed</em:name>
            <em:description>{$worldcup->getStringNoHTML('Adds a Goal.com feed to your Firefox for Android homepage.')}</em:description>
          </Description>
        </em:localized>
TEMPLATE;

    return $l10n_desc;
};

$fennec_feeds_description_template = function($locale) use($fennec_feed) {
    $l10n_desc = <<<TEMPLATE

        <em:localized>
          <Description>
            <em:locale>{$locale}</em:locale>
            <em:name>Home Feeds</em:name>
            <em:description>{$fennec_feed->getStringNoHTML('Allows you to subscribe to feeds on your home page.')}</em:description>
          </Description>
        </em:localized>
TEMPLATE;

    return $l10n_desc;
};

$privacy_coach_properties_template = function() use($privacy_coach_properties) {
    return <<<TEMPLATE
privacyCoach.title={privacy_coach_properties->getStringNoHTML('Privacy Coach')}

httpsWarning.message={privacy_coach_properties->getStringNoHTML("%S doesn't use https. Are you sure you want to continue?")}
httpsWarning.dontAsk={privacy_coach_properties->getStringNoHTML("Don't ask me again for %S")}

defaultWarning.message={privacy_coach_properties->getStringNoHTML("%S doesn't use https. You may want to change your default.")}

addEngineWarning.message={privacy_coach_properties->getStringNoHTML("%S doesn't use https. Are you sure you want to add this search engine?")}

prefs.dnt.noPref={privacy_coach_properties->getStringNoHTML('Do not tell sites anything about my tracking preferences')}
prefs.dnt.disallowTracking={privacy_coach_properties->getStringNoHTML('Tell sites that I do not want to be tracked')}
prefs.dnt.allowTracking={privacy_coach_properties->getStringNoHTML('Tell sites that I want to be tracked')}

prefs.cookies.firstPartyOnly={privacy_coach_properties->getStringNoHTML('Enabled, excluding 3rd party')}

prefs.enabled={privacy_coach_properties->getStringNoHTML('Enabled')}
prefs.disabled={privacy_coach_properties->getStringNoHTML('Disabled')}

prefs.currentValue={privacy_coach_properties->getStringNoHTML('Current value: %S')}

search.https={privacy_coach_properties->getStringNoHTML("Your default search engine (%S) uses HTTPS, so you're already secure.")}
search.http={privacy_coach_properties->getStringNoHTML("Your default search engine (%S) doesn't use HTTPS, so you may want to change your default now.")}

# https://support.mozilla.org/kb/clear-your-browsing-history-and-other-personal-dat
banner.1.text={privacy_coach_properties->getStringNoHTML('Learn the different ways you can clear personal data stored in Firefox.')}

# https://support.mozilla.org/kb/create-secure-passwords-keep-your-identity-safe
banner.2.text={privacy_coach_properties->getStringNoHTML('Learn how to create secure, easy-to-remember passwords to keep your identity safe on the internet.')}

# https://support.mozilla.org/kb/firefox-health-report-understand-your-android-browser-perf
banner.3.text={privacy_coach_properties->getStringNoHTML('Learn how Firefox Health Report lets you know how well your browser is performing and what steps you can take to improve it.')}

# https://support.mozilla.org/kb/how-does-insecure-content-affect-safety-android
banner.4.text={privacy_coach_properties->getStringNoHTML('Learn how Firefox for Android automatically blocks insecure or mixed content from secure web pages.')}

# https://support.mozilla.org/kb/share-your-android-device-firefox-guest-session
banner.5.text={privacy_coach_properties->getStringNoHTML('Learn how to create a Guest Session to let someone else use Firefox without giving them access to your personal information.')}

# https://support.mozilla.org/kb/mobile-private-browsing-browse-web-without-saving-syncing-info
banner.6.text={privacy_coach_properties->getStringNoHTML("Learn how to create private tabs to browse the internet without saving any information about what pages you've visited.")}

TEMPLATE;
};

$privacy_coach_dtd_template = function() use($privacy_coach_dtd) {
    return <<<TEMPLATE
<!ENTITY welcome.firefoxPrivacyCoach    "{$privacy_coach_dtd->getStringNoHTML('Firefox Privacy Coach')}">
<!ENTITY welcome.byMozilla              "{$privacy_coach_dtd->getStringNoHTML('by Mozilla')}">

<!ENTITY welcome.intro                  "{$privacy_coach_dtd->getStringNoHTML('Welcome to the Firefox Privacy Coach! This add-on will teach you about the privacy features that Firefox has to offer.')}">

<!ENTITY prefs.title                    "{$privacy_coach_dtd->getStringNoHTML('Privacy Preferences')}">
<!ENTITY prefs.intro                    "{$privacy_coach_dtd->getStringNoHTML("Firefox allows you to customize preferences that affect your privacy. We've broken down this list of preferences to explain what they actually mean and help you figure out what setting is right for you.")}">

<!ENTITY prefs.dnt.name                 "{$privacy_coach_dtd->getStringNoHTML('Do Not Track')}">
<!ENTITY prefs.dnt.desc                 "{$privacy_coach_dtd->getStringNoHTML("Most major websites track their visitors' behavior and then sell or provide that information to other companies (like advertisers). Firefox has a Do Not Track feature that lets you tell websites you don't want your browsing behavior tracked.")}">
<!ENTITY prefs.cookies.name             "{$privacy_coach_dtd->getStringNoHTML('Cookies')}">
<!ENTITY prefs.cookies.desc             "{$privacy_coach_dtd->getStringNoHTML('A cookie is information stored on your computer by a website you visit. Third-party cookies are cookies that are set by a website other than the one you are currently on. Some advertisers use these types of cookies to track your visits to the various websites on which they advertise.')}">
<!ENTITY prefs.fhr.name                 "{$privacy_coach_dtd->getStringNoHTML('Firefox Health Report')}">
<!ENTITY prefs.fhr.desc                 "{$privacy_coach_dtd->getStringNoHTML('The Firefox Health Report provides you with information about your browser’s performance and stability over time. Mozilla uses this data to provide you with meaningful comparisons and tips. We also aggregate the data shared by everyone to make Firefox better for you.')}">
<!ENTITY prefs.telemetry.name           "{$privacy_coach_dtd->getStringNoHTML('Telemetry')}">
<!ENTITY prefs.telemetry.desc           "{$privacy_coach_dtd->getStringNoHTML('Telemetry shares more detailed performance, usage, hardware and customization data about your browser with Mozilla to help us make the browser better.')}">
<!ENTITY prefs.crash.name               "{$privacy_coach_dtd->getStringNoHTML('Crash Reporter')}">
<!ENTITY prefs.crash.desc               "{$privacy_coach_dtd->getStringNoHTML("The crash reporter lets you choose to submit crash reports to Mozilla to help us make the browser more stable and secure. This can help the engineers at Mozilla make your browser, but it may include some personal data, such as URLs you've visited.")}">
<!ENTITY prefs.mls.name                 "{$privacy_coach_dtd->getStringNoHTML('Mozilla Location Services')}">
<!ENTITY prefs.mls.desc                 "{$privacy_coach_dtd->getStringNoHTML('Mozilla Location Services shares approximate Wi-Fi and cellular location with Mozilla to help improve our geolocation service.')}">

<!ENTITY features.title                 "{$privacy_coach_dtd->getStringNoHTML('Other Privacy Features')}">
<!ENTITY features.intro                 "{$privacy_coach_dtd->getStringNoHTML('In addition to cutomizable privacy preferences, Firefox also includes features that you can use to keep your data private.')}">

<!ENTITY features.learnMore             "{$privacy_coach_dtd->getStringNoHTML('Learn More')}">

<!ENTITY features.pb.title              "{$privacy_coach_dtd->getStringNoHTML('Private Browsing')}">
<!ENTITY features.pb.desc.pre           "{$privacy_coach_dtd->getStringNoHTML("You can create private tabs to browse the internet without saving any information about what pages you've visited.")}">
<!ENTITY features.pb.desc.post          "">

<!ENTITY features.gb.title              "{$privacy_coach_dtd->getStringNoHTML('Guest Browsing')}">
<!ENTITY features.gb.desc.pre           "{$privacy_coach_dtd->getStringNoHTML('A Guest Session lets someone else use Firefox on your Android device without giving them access to your personal info like passwords, bookmarks and history.')}">
<!ENTITY features.gb.desc.post          "">

<!ENTITY features.ch.title              "{$privacy_coach_dtd->getStringNoHTML('Clear History and Other Data')}">
<!ENTITY features.ch.desc.pre           "{$privacy_coach_dtd->getStringNoHTML('Firefox offers you control over your personal data, such as browsing history, passwords and more. You can conveniently save this data to your browser and delete it any time you want to.')}">
<!ENTITY features.ch.desc.post          "">

<!ENTITY features.ch.clearOnQuit        "{$privacy_coach_dtd->getStringNoHTML('In your privacy settings, you can also choose to clear private data every time you select &quot;Quit&quot; from the main menu.')}">

<!ENTITY httpsSearch.title              "{$privacy_coach_dtd->getStringNoHTML('')}HTTPS Search">
<!ENTITY httpsSearch.intro              "{$privacy_coach_dtd->getStringNoHTML("To keep your searches private, you should make sure to use search engines that support HTTPS. We'll prompt you before you make a search that goes over HTTP, and we'll also warn you if you try to make an HTTP search engine your default. You can change your default search engine at any time in the search settings page.")}">


<!ENTITY addons.title                   "{$privacy_coach_dtd->getStringNoHTML('Additional Add-ons')}">
<!ENTITY addons.description             "{$privacy_coach_dtd->getStringNoHTML('Even though Privacy Coach takes care of a lot of privacy-related preferences, here are a few more Add-ons that can make your browsing experence even more awesome:')}">

<!ENTITY addons.ghostery.title          "{$privacy_coach_dtd->getStringNoHTML('Ghostery')}">
<!ENTITY addons.ghostery.description    "{$privacy_coach_dtd->getStringNoHTML("Protect your privacy. See who's tracking your web browsing and block them.")}">
<!ENTITY addons.https.title             "{$privacy_coach_dtd->getStringNoHTML('HTTPS Everywhere')}">
<!ENTITY addons.https.description       "{$privacy_coach_dtd->getStringNoHTML('Encrypts your communications with many major websites, making your browsing more secure.')}">
<!ENTITY addons.sdc.title               "{$privacy_coach_dtd->getStringNoHTML('Self Destructing Cookies')}">
<!ENTITY addons.sdc.description         "{$privacy_coach_dtd->getStringNoHTML("Gets rid of a site's cookies and LocalStorage as soon as you close its tabs. Protects against trackers and zombie-cookies. Trustworthy services can be whitelisted.")}">
<!ENTITY addons.more.pre                "{$privacy_coach_dtd->getStringNoHTML('For even more add-ons, you can explore the full set of ')}">
<!ENTITY addons.more.link               "{$privacy_coach_dtd->getStringNoHTML('Security &amp; Privacy add-ons')}">
<!ENTITY addons.more.post               "{$privacy_coach_dtd->getStringNoHTML('.')}">

<!ENTITY settingsButton.privacy         "{$privacy_coach_dtd->getStringNoHTML('Privacy Settings')}">
<!ENTITY settingsButton.mozilla         "{$privacy_coach_dtd->getStringNoHTML('Mozilla Settings')}">
<!ENTITY settingsButton.search          "{$privacy_coach_dtd->getStringNoHTML('Search Settings')}">

TEMPLATE;
};

$privacy_coach_description_template = function($locale) use($privacy_coach_properties) {
    $l10n_desc = <<<TEMPLATE

        <em:localized>
          <Description>
            <em:locale>{$locale}</em:locale>
            <em:name>$privacy_coach_properties->getStringNoHTML('Privacy Coach')}</em:name>
            <em:description>{$privacy_coach_properties->getStringNoHTML('Add-on that helps you use privacy features in your browser.')}</em:description>
          </Description>
        </em:localized>
TEMPLATE;

    return $l10n_desc;
};
