<?php
namespace l10n;

$privacy_coach_properties_template = function() use($privacy_coach) {
    return <<<TEMPLATE
privacyCoach.title={$privacy_coach->getStringNoHTML('Privacy Coach')}

httpsWarning.message={$privacy_coach->getStringNoHTML("%S doesn't use https. Are you sure you want to continue?")}
httpsWarning.dontAsk={$privacy_coach->getStringNoHTML("Don't ask me again for %S")}

defaultWarning.message={$privacy_coach->getStringNoHTML("%S doesn't use https. You may want to change your default.")}

addEngineWarning.message={$privacy_coach->getStringNoHTML("%S doesn't use https. Are you sure you want to add this search engine?")}

prefs.dnt.noPref={$privacy_coach->getStringNoHTML('Do not tell sites anything about my tracking preferences')}
prefs.dnt.disallowTracking={$privacy_coach->getStringNoHTML('Tell sites that I do not want to be tracked')}
prefs.dnt.allowTracking={$privacy_coach->getStringNoHTML('Tell sites that I want to be tracked')}

prefs.cookies.firstPartyOnly={$privacy_coach->getStringNoHTML('Enabled, excluding 3rd party')}

prefs.enabled={$privacy_coach->getStringNoHTML('Enabled')}
prefs.disabled={$privacy_coach->getStringNoHTML('Disabled')}

prefs.currentValue={$privacy_coach->getStringNoHTML('Current setting: %S')}

search.https={$privacy_coach->getStringNoHTML("Your default search engine (%S) uses HTTPS. Search away!")}
search.http={$privacy_coach->getStringNoHTML("Your default search engine (%S) doesn't use HTTPS — you should consider changing it now.")}

# https://support.mozilla.org/kb/clear-your-browsing-history-and-other-personal-dat
banner.1.text={$privacy_coach->getStringNoHTML('Discover all the ways you can clear your personal browsing data from Firefox »')}

# https://support.mozilla.org/kb/create-secure-passwords-keep-your-identity-safe
banner.2.text={$privacy_coach->getStringNoHTML('Learn how to create secure, easy-to-remember passwords to keep your online identity safe »')}

# https://support.mozilla.org/kb/firefox-health-report-understand-your-android-browser-perf
banner.3.text={$privacy_coach->getStringNoHTML('Firefox Health Report determines how well your browser is performing and what you can do to improve it. Learn more »')}

# https://support.mozilla.org/kb/how-does-insecure-content-affect-safety-android
banner.4.text={$privacy_coach->getStringNoHTML('Discover how Firefox for Android automatically blocks unsecure or mixed content from otherwise secure Web pages »')}

# https://support.mozilla.org/kb/share-your-android-device-firefox-guest-session
banner.5.text={$privacy_coach->getStringNoHTML('A guest session allows someone else to use your Firefox without giving them access to your personal information. Learn more »')}

# https://support.mozilla.org/kb/mobile-private-browsing-browse-web-without-saving-syncing-info
banner.6.text={$privacy_coach->getStringNoHTML('Browse the Internet without having any of your personal browsing data or history being saved. Learn more »')}

TEMPLATE;
};

$privacy_coach_dtd_template = function() use($privacy_coach) {

    $link1 = 'Firefox Health Report provides you with information about your browser’s performance and stability over time. It then gives you useful tips based on that data to help you get the most out of your browsing experience. For more information about how we handle your data, see our <a>privacy policy</a>.';
    $link2 = 'For even more, you can explore our full set of <a>Security &amp; Privacy add-ons »</a>';

    return <<<TEMPLATE
<!ENTITY welcome.title                  "{$privacy_coach->getStringNoHTML('Firefox Privacy Coach')}">

<!ENTITY welcome.firefoxPrivacyCoach    "{$privacy_coach->getStringNoHTML('Firefox Privacy Coach')}">
<!ENTITY welcome.byMozilla              "{$privacy_coach->getStringNoHTML('by Mozilla')}">

<!ENTITY welcome.intro                  "{$privacy_coach->getStringNoHTML('Welcome to Privacy Coach, your one-stop shop to learn about and manage your Firefox for Android privacy settings. You can revisit this page at any time by opening the Tools menu in your browser.')}">

<!ENTITY prefs.title                    "{$privacy_coach->getStringNoHTML('Privacy Preferences')}">
<!ENTITY prefs.intro                    "{$privacy_coach->getStringNoHTML('Firefox allows you to customize various settings in an effort to make your browsing experience as private and secure as possible. We’ve broken down this list of preferences to explain what they do and to help you figure out which settings are right for you.')}">

<!ENTITY prefs.dnt.name                 "{$privacy_coach->getStringNoHTML('Do Not Track')}">
<!ENTITY prefs.dnt.desc                 "{$privacy_coach->getStringNoHTML('This Firefox innovation helps you stay in control of how your browsing information is collected and used online. When the feature is enabled, Firefox will tell advertising networks, websites and applications that you want to opt out of tracking for purposes like behavioral advertising.')}">
<!ENTITY prefs.dnt.learnMore            "{$privacy_coach->getStringNoHTML('Learn more about Do Not Track')}">

<!ENTITY prefs.cookies.name             "{$privacy_coach->getStringNoHTML('Cookies')}">
<!ENTITY prefs.cookies.desc             "{$privacy_coach->getStringNoHTML('A cookie is information stored on your computer about the websites you visit. Third-party cookies are those set by a website other than the one you are currently on. Some advertisers use these types of cookies to track your visits to the websites on which they advertise. Firefox has settings that allow you to approve or deny cookie storage requests, delete cookies automatically and more.')}">
<!ENTITY prefs.cookies.learnMore        "{$privacy_coach->getStringNoHTML('Learn more about Cookies')}">

<!ENTITY prefs.fhr.name                 "{$privacy_coach->getStringNoHTML('Firefox Health Report')}">
<!ENTITY prefs.fhr.pre                  "{$privacy_coach->getStringPreNoHTML($link1)}">
<!ENTITY prefs.fhr.link                 "{$privacy_coach->getStringLinkNoHTML($link1)}">
<!ENTITY prefs.fhr.post                 "{$privacy_coach->getStringPostNoHTML($link1)}">
<!ENTITY prefs.fhr.learnMore            "{$privacy_coach->getStringNoHTML('Learn more about Firefox Health Report')}">

<!ENTITY prefs.telemetry.name           "{$privacy_coach->getStringNoHTML('Telemetry')}">
<!ENTITY prefs.telemetry.desc           "{$privacy_coach->getStringNoHTML('Telemetry measures and collects non-personal information about the performance of your Firefox browser — such as memory consumption, browser speed and feature usage — and sends it to Mozilla. That information is then used to help us make Firefox better for you.')}">
<!ENTITY prefs.telemetry.learnMore      "{$privacy_coach->getStringNoHTML('Learn more about Telemetry')}">

<!ENTITY prefs.crash.name               "{$privacy_coach->getStringNoHTML('Crash Reporter')}">
<!ENTITY prefs.crash.desc               "{$privacy_coach->getStringNoHTML("The Crash Reporter gives you the opportunity to submit crash reports to Mozilla in an effort to help us make Firefox more stable and secure. A crash report may include some personal data, such as the URLs you've visited.")}">
<!ENTITY prefs.crash.learnMore          "{$privacy_coach->getStringNoHTML('Learn more about Crash Reporter')}">

<!ENTITY prefs.mls.name                 "{$privacy_coach->getStringNoHTML('Mozilla Location Services')}">
<!ENTITY prefs.mls.desc                 "{$privacy_coach->getStringNoHTML('Mozilla Location Services shares approximate Wi-Fi and cellular location with Mozilla to help improve our geolocation service.')}">

<!ENTITY features.title                 "{$privacy_coach->getStringNoHTML('Privacy Features')}">
<!ENTITY features.intro                 "{$privacy_coach->getStringNoHTML('In addition to the customizable privacy preferences above, Firefox also includes several privacy features that you can use everyday to help keep your personal browsing data private.')}">

<!ENTITY features.pb.title              "{$privacy_coach->getStringNoHTML('Private Browsing')}">
<!ENTITY features.pb.desc               "{$privacy_coach->getStringNoHTML('When Private Browsing tabs are opened, Firefox for Android won’t accept cookies, remember passwords or record a history of any sites that you’ve visited. You can open a Private Browsing session by tapping on your browser menu icons and selecting &quot;New Private Tab&quot;.')}">
<!ENTITY features.pb.learnMore          "{$privacy_coach->getStringNoHTML('Learn more about Private Browsing')}">

<!ENTITY features.gb.title              "{$privacy_coach->getStringNoHTML('Guest Browsing')}">
<!ENTITY features.gb.desc               "{$privacy_coach->getStringNoHTML('A Guest Browsing session lets someone else use Firefox on your Android device without seeing your personal info like passwords, bookmarks and history.')}">
<!ENTITY features.gb.learnMore          "{$privacy_coach->getStringNoHTML('Learn more about Guest Browsing')}">

<!ENTITY features.ch.title              "{$privacy_coach->getStringNoHTML('Clear History and other data')}">
<!ENTITY features.ch.desc               "{$privacy_coach->getStringNoHTML('Easily delete your personal data, such as browsing history, passwords and more any time you like. In your privacy settings, you can also choose to clear private data every time you select &quot;Quit&quot; from the main menu.')}">
<!ENTITY features.ch.learnMore          "{$privacy_coach->getStringNoHTML('Learn how to clear your history')}">

<!ENTITY httpsSearch.title              "{$privacy_coach->getStringNoHTML('HTTPS Search')}">
<!ENTITY httpsSearch.intro              "{$privacy_coach->getStringNoHTML('To keep your online searches private, we recommend only using search engines that support HTTPS, a secure communications protocol. To help keep you informed, Firefox will prompt you before you make a search that goes over an unsecured HTTP network. Firefox will also give you a warning if you try to make an HTTP search engine your default. You can change your default search engine at any time in the search settings page.')}">

<!ENTITY addons.title                   "{$privacy_coach->getStringNoHTML('Additional Add-ons')}">
<!ENTITY addons.description             "{$privacy_coach->getStringNoHTML("We hope you’ve found the Firefox Privacy Coach helpful and have a better understanding of your browser's many privacy features and settings. If you would like even more control of your personal browsing data, check out some of the add-ons listed below.")}">

<!ENTITY addons.ghostery.title          "{$privacy_coach->getStringNoHTML('Ghostery')}">
<!ENTITY addons.ghostery.description    "{$privacy_coach->getStringNoHTML("Protects your privacy by letting you see who's tracking your Web browsing and block them.")}">
<!ENTITY addons.https.title             "{$privacy_coach->getStringNoHTML('HTTPS Everywhere')}">
<!ENTITY addons.https.description       "{$privacy_coach->getStringNoHTML('Encrypts your communications with many major websites, making your browsing more secure.')}">
<!ENTITY addons.sdc.title               "{$privacy_coach->getStringNoHTML('Self Destructing Cookies')}">
<!ENTITY addons.sdc.description         "{$privacy_coach->getStringNoHTML("Gets rid of a site's cookies and LocalStorage as soon as you close any open tabs for that page. It also protects against trackers and zombie-cookies and lets you whitelist services you know are trustworthy.")}">
<!ENTITY addons.more.pre                "{$privacy_coach->getStringPreNoHTML($link2)}">
<!ENTITY addons.more.link               "{$privacy_coach->getStringLinkNoHTML($link2)}">
<!ENTITY addons.more.post               "{$privacy_coach->getStringPostNoHTML($link2)}">

<!ENTITY settingsButton.privacy         "{$privacy_coach->getStringNoHTML('Privacy Settings')}">
<!ENTITY settingsButton.mozilla         "{$privacy_coach->getStringNoHTML('Mozilla Settings')}">
<!ENTITY settingsButton.search          "{$privacy_coach->getStringNoHTML('Search Settings')}">

<!ENTITY features.learnMore             "{$privacy_coach->getStringNoHTML('Learn More')}">

TEMPLATE;
};

$privacy_coach_description_template = function($locale) use($privacy_coach) {
    return <<<TEMPLATE

        <em:localized>
          <Description>
            <em:locale>{$locale}</em:locale>
            <em:name>{$privacy_coach->getStringNoHTML('Privacy Coach')}</em:name>
            <em:description>{$privacy_coach->getStringNoHTML('Add-on that helps you use privacy features in your browser.')}</em:description>
          </Description>
        </em:localized>
TEMPLATE;
};
