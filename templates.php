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
