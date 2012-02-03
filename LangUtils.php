<?php

/*
* Copyright (c) 2011 seb26. All rights reserved.
* Source code is licensed under the terms of the 3-clause Modified BSD License.
*
* MediaWiki is free software; you can redistribute it and/or modify it under the
* terms of the GNU General Public License as published by the Free Software Foundation.
* <http://www.mediawiki.org/>
*
*/

if ( !defined( 'MEDIAWIKI' ) ) { die( 'This file is a MediaWiki extension, it is not a valid entry point' ); }

$wgExtensionCredits['parserhook'][] = array(
'name' => 'LangUtils',
'author' => 'seb26',
'url' => 'https://github.com/seb26/mw-extensions',
'description' => 'Utilities to assist multilingual wikis' # lololol
);


# Global variable defaults

$wgAllowedLanguages = array(
	'ar',
	'cs',
	'da',
	'de',
	'es',
	'fi',
	'fr',
	'hu',
	'it',
	'ja',
	'ko',
	'nl',
	'no',
	'pl',
	'pt',
	'pt-br',
	'ro',
	'ru',
	'sv',
	'tr',
	'zh-hans',
	'zh-hant'
);

$wgLangUtils_LangSwitch = true;
$wgLangUtils_SidebarList = true;
	$wgLangUtils_SidebarList_NS = array(
		NS_TEMPLATE,
		NS_HELP,
		NS_TALK,
		NS_CATEGORY,
		NS_MAIN,
		NS_FILE
	);
$wgLangUtils_PageClass = true;

# Setup

$wgExtensionFunctions[] = 'wfLangUtilsSetup';

function wfLangUtilsSetup() {

	global
		$wgLangUtils_LangSwitch,
		$wgLangUtils_SidebarList,
		$wgLangUtils_PageClass,

		$wgHooks,
		$wgAllowedLanguages;

	# $wgAutoloadClasses['ExtLangUtils'] = dirname( __FILE__ );

	if ( $wgLangUtils_LangSwitch || $wgLangUtils_SidebarList || $wgLangUtils_PageClass ) {

		if ( $wgLangUtils_LangSwitch ) {
			$wgHooks['ParserFirstCallInit'][] = 'wfLangUtils_ParserFirstCallInit';
			$wgHooks['MagicWordwgVariableIDs'][] = 'wfLangUtils_MagicWordwgVariableIDs';
			$wgHooks['LanguageGetMagic'][] = 'wfLangUtils_LanguageGetMagic';
			$wgHooks['ParserGetVariableValueSwitch'][] = 'ExtLangUtils::getVariableValue';
		}

		if ( $wgLangUtils_SidebarList ) {
			$wgHooks['SkinBuildSidebar'][] = 'ExtLangUtils::skinAddSidebar';
		}
		if ( $wgLangUtils_PageClass ) {
			$wgHooks['OutputPageBodyAttributes'][] = 'ExtLangUtils::skinAddBodyClass';
		}

	}

	return true;

}

function wfLangUtils_ParserFirstCallInit( $parser ) {
	$parser->setFunctionHook( 'langswitch', 'ExtLangUtils::langswitch', SFH_OBJECT_ARGS );
	$parser->setFunctionHook( 'ifpagelang', 'ExtLangUtils::ifpagelang', SFH_OBJECT_ARGS );

	# Variables
	$parser->setFunctionHook( 'pagelang', 'ExtLangUtils::pagelang', SFH_NO_HASH );
	$parser->setFunctionHook( 'pagelangsuffix', 'ExtLangUtils::pagelangsuffix', SFH_NO_HASH );
	return true;
}

function wfLangUtils_LanguageGetMagic( &$magicWords, $langCode ) {
	$magicWords['langswitch'] = array( 0, 'langswitch' );
	$magicWords['ifpagelang'] = array( 0, 'ifpagelang' );
	$magicWords['pagelang'] = array( 0, 'pagelang' );
	$magicWords['pagelangsuffix'] = array( 0, 'pagelangsuffix' );
	return true;
}

function wfLangUtils_MagicWordwgVariableIDs( &$customVariableIds ) {
	$customVariableIds[] = 'pagelang';
	$customVariableIds[] = 'pagelangsuffix';
	return true;
}

class ExtLangUtils {

	# For obtaining the page language from a title string, preferably given from Title->mTextform.
	public static function getLang( $title, $namespace = false, $returnMatch = false ) {
		global $wgAllowedLanguages;

		if ( $title == null || $title == '' ) {
			return '';
		}

		# Use regular expression if page is a file
		if ( $namespace == NS_FILE ) {
			
			$end = end( explode( ' ', $title ) );

			$m = preg_match( '/\.?(.+?)\..+?$/', $end, $match );
			if ( $m ) {
				$lang = $match[1];
			}
			else {
				$lang = 'en';
			}

			if ( !in_array( $lang, $wgAllowedLanguages ) ) {
				$lang = 'en';
			}

			if ( $returnMatch ) {
				return array( $lang, $match );
			}
			else {
				return $lang;
			}

		}
		else {

			$tparts = explode( '/', $title );

			if ( count( $tparts ) == 1 ) {
				# No slashes, assume English
				return 'en';
			}

			$lang = end( $tparts );

			if ( !in_array( $lang, $wgAllowedLanguages ) ) {
				$lang = 'en';
			}

			return $lang;

		}
	}
	
	public static function setLang( &$parser ) {
		$title = $parser->getTitle();
		if ( !isset( $title->mPageLang ) ) {
			$title->mPageLang = ExtLangUtils::getLang( $title->mTextform, $title->mNamespace );
		}
		return true;
	}

	public static function getVariableValue( &$parser, &$cache, &$magicWordId, &$ret ) {
		ExtLangUtils::setLang( $parser );
		switch ( $magicWordId ) {
			case 'pagelang':
				# Simply return the page language as a magic word variable.
				$ret = $parser->getTitle()->mPageLang;
				break;
			case 'pagelangsuffix':
				# Returns '' for en pages and '/xx' for language pages. Replacement
				# of {{if lang}} templates. More advanced needs can use {{#ifpagelang:}}
				# instead, as it has '$1' replacement features.
				$lang = $parser->getTitle()->mPageLang;
				if ( $lang == 'en' ) {
					$ret = '';
				}
				else {
					$ret = '/' . $lang;
				}
				break;
			default:
				$ret = '';
				break;
		}
		return true;
	}
	
	##
	## {{#langswitch:}} and related parser functions
	##

	# {{#ifpagelang:}} will return a value similarily to {{#ifeq:}} based on the page's language. All
	# instances of '$1' inside each string will be replaced with the page's current language, to avoid
	# the need for {{PAGELANG}} calls inside each string; now it is just '$1'.
	public static function ifpagelang( $parser, $frame, $args ) {
		ExtLangUtils::setLang( $parser );

		$value = trim( $frame->expand( $args[0] ) ); # the first field (i.e. the lang code to check against)

		if ( $value == '' || $value == null ) {
			$value = 'en';
		}

		$lang = $parser->getTitle()->mPageLang;

		$true = isset( $args[1] ) ? $args[1] : '';
		$false = isset( $args[2] ) ? $args[2] : '';

		if ( $lang == $value ) {
			return str_replace( '$1', $lang, trim( $frame->expand( $true ) ) ); # Expand the 'True' field.
		}
		else {
			return str_replace( '$1', $lang, trim( $frame->expand( $false ) ) ); # Expand the 'False' field.
		}

	}

	public static function langswitch( $parser, $frame, $args ) {
		ExtLangUtils::setLang( $parser );

		if ( count( $args ) == 0 ) {
			return '';
		}

		# First argument is the 'force' parameter. Should be left undefined in wikisyntax, most of the time.
		# Depending on whether or not it is, $lang will serve as the working variable (force or not).

		$forceLang = trim( $frame->expand( $args[0] ) );
		if ( $forceLang == '' || $forceLang == null ) {
			# $forceLang itself will always be given a value, but if it is empty / null,
			# assume that no language is being forced and just use the page lang.
			$lang = $parser->getTitle()->mPageLang;
		}
		else {
			$lang = $forceLang;
		}
		array_shift( $args ); # Remove first argument, as we cannot iterate over it (was made a string earlier).

		$en = '';
		$enFound = false;
		foreach ( $args as $arg ) {
			$bits = $arg->splitArg();
			$name = trim( $frame->expand( $bits['name'] ) );

			if ( $name == 'en' ) {
				# Found en, storing the node for laters
				$en = $bits['value'];
				$enFound = true;
			}
			if ( $name == $lang ) {
				return trim( $frame->expand( $bits['value'] ) );
			}
		}

		# $lang wasn't found. Put $en or blank string.
		if ( $enFound ) {
			return trim( $frame->expand( $en ) );
		}
		else {
			return '';
		}

	}

	##
	## Skin functions
	##

	public static function skinAddSidebar( $skin, &$bar ) {
		global $wgContLang, $wgAllowedLanguages, $wgLangUtils_SidebarList_NS;

		$title = $skin->getTitle();

		# Check the page's namespace is in the whitelist.
		if ( in_array( $title->mNamespace, $wgLangUtils_SidebarList_NS ) ) {

			$titleText = $title->mPrefixedText;
			$namespace = $title->mNamespace;

			$langParts = ExtLangUtils::getLang( $titleText, $namespace, $returnMatch = True );

			if ( $namespace == NS_FILE ) {
				$pageLang = $langParts[0];

				# Getting extension from filename. Remove no characters if English.
				# e.g. "ru.zip" -> ".zip"; ".zip" -> ".zip"

				if ( $pageLang == 'en' ) {
					$minus = strlen( $langParts[1][1] );
				}
				else {
					$minus = strlen( $pageLang );
				}

				$fileExt = substr( $langParts[1][0], $minus );

				if ( $pageLang == 'en' ) {
					$tPrefix = substr( $titleText, 0, -strlen( $fileExt ) );

					$enURL = $title->getLinkUrl();
				}
				else {
					$tPrefix = substr( $titleText, 0, -strlen( $langParts[1][0] ) - 1 );
					$enTitle = $tPrefix . $fileExt;

					$enURL = Title::newFromText( $enTitle )->getLinkUrl();
				}

			}
			else {
				$fileExt = false;
				$pageLang = $langParts;

				$tparts = explode( '/', $titleText );

				# If there are 2 or more title parts, there is some work to be done.
				if ( count( $tparts ) >= 2 ) {
					if ( $pageLang == 'en' ) {
						$langPrefix = $title->mPrefixedText;
					}
					else {
						$langPrefix = implode( '/', array_slice( $tparts, 0, -1, true ) );
					}
				}
				else {
					$langPrefix = $tparts[0];
				}

				if ( $pageLang == 'en' ) {
					$enURL = $title->getLinkUrl();
				}
				else {
					$enURL = Title::newFromText( $langPrefix )->getLinkUrl();
				}

			}

			# Start building the list of links.
			$output = '<ul>';
			$output .= "<li id=\"n-en\"><a href=\"$enURL\">English</a></li>";

			foreach ( $wgAllowedLanguages as $lang ) {

				if ( $namespace == NS_FILE ) {
					$page = Title::newFromText( $tPrefix . ' ' . $lang . $fileExt );
				}
				else {
					$page = Title::newFromText( $langPrefix . '/' . $lang );
				}

				if ( $page->getArticleID() !== 0 ) {
					# ID is non-zero, meaning it exists
					$localname = $wgContLang->getLanguageName( $lang ); # Is there a better way to do this?
					$URL = $page->getLinkUrl();
					$output .= "<li id=\"n-$lang\"><a href=\"$URL\">$localname</a></li>";
				}
			}

			$output .= '</ul>';
			$bar['Languages'] = $output; # Add the completed HTML to the sidebar.

		}

		return true;

	}

	public static function skinAddBodyClass( $out, $skin, &$bodyAttrs ) {

		$pageLang = ExtLangUtils::getLang( $out->mPagetitle, $out->getTitle()->mNamespace );
		$bodyAttrs['class'] .= ' pagelang-' . $pageLang;

		return true;
	}

}
