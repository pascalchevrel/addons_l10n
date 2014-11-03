addons_l10n
===========

Scripts I use to quickly translate an addon while it is still in development.

Instructions:

1/ fork the privacy-coach add-on https://github.com/leibovic/privacy-coach

2/ edit config.php and fill in your local path for your fork of the add-on (PRIVACY_COACH)

3/ edit config.php and fill in your local path for the addons svn repo (https://svn.mozilla.org/projects/l10n-misc/trunk/add-ons)

4/ run generate.php

If there are changes to your local copy of the privacy-coach repo, that means that a locale is complete. Add it to a branch in your repo and make a pull request.
