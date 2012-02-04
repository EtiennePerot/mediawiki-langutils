LangUtils
====================

**LangUtils** is an extension for [MediaWiki](http://www.mediawiki.org/wiki/MediaWiki), an open-source wiki software package, written by **seb26**. To wikis that support multiple languages on the same site, LangUtils provides extra tools and functionality for navigation and displaying language-specific content.

### Functionality

* LangSwitch &ndash; 1.16.5+ &ndash; enables `{{#langswitch:}}` and other function hooks to display the correct translation depending on the page. The below function hooks are available:
      * `{{#langswitch:}}` &ndash; a #switch replacement. Define language strings as separate arguments (e.g. `| ru = Russian`) and the correct string will display depending on the page language. If string not available, display in English.
      * `{{#ifpagelang:}}` &ndash; test for a particular page language. Example: `{{#ifpagelang:fr|French|Not French}}` would provide different outputs. Any instances of '$1' in the text will also be replaced with the code for that page. Example: `{{#ifpagelang:de|German|Not German, $1}}` would result in "Not German, en" if used on an English page.
      * `{{PAGELANG}}` &ndash; outputs the page language code. Additionally, another title can be specified: `{{PAGELANG:Page/ru}}` would output "ru".
      * `{{PAGELANGSUFFIX}}` &ndash; if the page is non-English, this will output "/xx"; if the page is English, however, no text will be returned. Convenient for creating links to pages depending on the language. Additionally, another title can be specified: `{{PAGELANGSUFFIX:Page/ru}}` would output "/ru".
* SidebarList &ndash; 1.14.0+ &ndash; adds a list of all existing translations to the navigation links (replaces manual solutions like {{languages}})
    * SidebarList also provides links for file pages (for `File:Test.png`, it will link to `File:Test fr.png`, `File:Test de.png`, etc).
* PageClass &ndash; 1.17.0+ &ndash; adds `pagelang-xx` class to the `<body>` tag to allow language-specific CSS

### Installation

The following code should be added to `LocalSettings.php`:

    require_once( "$IP/extensions/LangUtils/LangUtils.php" );

Optional variables:

* `$wgLangUtils_LangSwitch` &ndash; set to false to disable {{#langswitch:}}
* `$wgLangUtils_SidebarList` &ndash; set to false to disable the sidebar list
    * `$wgLangUtils_SidebarList_NS` &ndash; whitelist of namespaces to display the sidebar listing on (give as array of namespace constants, e.g. `NS_MAIN`)
* `$wgLangUtils_PageClass` &ndash; set to false to disable language CSS class (**Note**: this must be disabled on installations lower than 1.17.0).
* `$wgAllowedLanguages` &ndash; array of strings containing all supported language codes

### Development

#### Testing

* Developed for, and tested on MediaWiki stable branch (currently **1.18.1**).
* Untested on 1.18.0 or lower.

#### TODO

* Test on older versions.

### Licensing

All extensions are copyright (c) 2011 **seb26**. Source code is free to be modified or distributed under the terms of the Modified BSD License. MediaWiki is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation.
