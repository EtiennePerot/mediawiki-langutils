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
$wgLangUtils_ChangeAnonLang = true;

# Copied straight from https://svn.wikimedia.org/viewvc/mediawiki/trunk/phase3/languages/Names.php?revision=113600
# Further versions have sometimes-lowercase language names, and ucwords() only works on ASCII characters.

$coreLanguageNames_titlecase = array(
	'aa' => 'Qafár af',	# Afar
	'ab' => 'Аҧсуа',	# Abkhaz, should possibly add ' бысжѡа'
	'ace' => 'Acèh',	# Aceh
	'af' => 'Afrikaans',	# Afrikaans
	'ak' => 'Akan',		# Akan
	'aln' => 'Gegë',	# Gheg Albanian
	'als' => 'Alemannisch',	# Alemannic -- not a valid code, for compatibility. See gsw.
	'am' => 'አማርኛ',	# Amharic
	'an' => 'Aragonés',	# Aragonese
	'ang' => 'Ænglisc',	# Old English (Bug 23283)
	'anp' => 'अङ्गिका',	# Angika
	'ar' => 'العربية',	# Arabic
	'arc' => 'ܐܪܡܝܐ',	# Aramaic
	'arn' => 'Mapudungun',	# Mapuche, Mapudungu, Araucanian (Araucano)
	'ary' => 'Maġribi',	# Moroccan Spoken Arabic
	'arz' => 'مصرى',	# Egyptian Spoken Arabic
	'as' => 'অসমীয়া',	# Assamese
	'ast' => 'Asturianu',	# Asturian
	'av' => 'Авар',	# Avar
	'avk' => 'Kotava', # Kotava
	'ay' => 'Aymar aru',	# Aymara
	'az' => 'Azərbaycanca',	# Azerbaijani
	'ba' => 'Башҡортса',	# Bashkir
	'bar' => 'Boarisch',	# Bavarian (Austro-Bavarian and South Tyrolean)
	'bat-smg' => 'Žemaitėška', # Samogitian (deprecated code, 'sgs' in ISO 693-3 since 2010-06-30 )
	'bcc' => 'بلوچی مکرانی', # Southern Balochi
	'bcl' => 'Bikol Central', # Bikol: Central Bicolano language
	'be' => 'Беларуская',	#  Belarusian normative
	'be-tarask' => "\xE2\x80\xAAБеларуская (тарашкевіца)\xE2\x80\xAC",	# Belarusian in Taraskievica orthography
	'be-x-old' => "\xE2\x80\xAAБеларуская (тарашкевіца)\xE2\x80\xAC",	# Belarusian in Taraskievica orthography; compat link
	'bg' => 'Български',	# Bulgarian
	'bh' => 'भोजपुरी',	# Bihari marco language. Falls back to Bhojpuri (bho).
	'bho' => 'भोजपुरी',	# Bhojpuri
	'bi' => 'Bislama',		# Bislama
	'bjn' => 'Bahasa Banjar',	# Banjarese
	'bm' => 'Bamanankan',	# Bambara
	'bn' => 'বাংলা',	# Bengali
	'bo' => 'བོད་ཡིག',	# Tibetan
	'bpy' => 'ইমার ঠার/বিষ্ণুপ্রিয়া মণিপুরী',	# Bishnupriya Manipuri
	'bqi' => 'بختياري',	# Bakthiari
	'br' => 'Brezhoneg',	# Breton
	'brh' => 'Bráhuí',	# Brahui
	'bs' => 'Bosanski',		# Bosnian
	'bug' => 'ᨅᨔ ᨕᨘᨁᨗ',	# Bugis
	'bxr' => 'Буряад',	# Buryat (Russia)
	'ca' => 'Català',	# Catalan
	'cbk-zam' => 'Chavacano de Zamboanga',	# Zamboanga Chavacano
	'cdo' => 'Mìng-dĕ̤ng-ngṳ̄',	# Min Dong
	'ce' => 'Нохчийн',	# Chechen
	'ceb' => 'Cebuano',     # Cebuano
	'ch' => 'Chamoru',		# Chamorro
	'cho' => 'Choctaw',		# Choctaw
	'chr' => 'ᏣᎳᎩ', # Cherokee
	'chy' => 'Tsetsêhestâhese',	# Cheyenne
	'ckb' => 'کوردی',	# Sorani
	'co' => 'Corsu',		# Corsican
	'cps' => 'Capiceño', # Capiznon
	'cr' => 'Nēhiyawēwin / ᓀᐦᐃᔭᐍᐏᐣ',		# Cree
	'crh' => 'Qırımtatarca',   # Crimean Tatar (multiple scripts - defaults to Latin)
	'crh-latn' => "\xE2\x80\xAAQırımtatarca (Latin)\xE2\x80\xAC",       # Crimean Tatar (Latin)
	'crh-cyrl' => "\xE2\x80\xAAКъырымтатарджа (Кирилл)\xE2\x80\xAC",       # Crimean Tatar (Cyrillic)
	'cs' => 'Česky',	# Czech
	'csb' => 'Kaszëbsczi',	# Cassubian
	'cu' => 'Словѣ́ньскъ / ⰔⰎⰑⰂⰡⰐⰠⰔⰍⰟ',	# Old Church Slavonic (ancient language)
	'cv' => 'Чӑвашла',	# Chuvash
	'cy' => 'Cymraeg',		# Welsh
	'da' => 'Dansk',		# Danish
	'de' => 'Deutsch',		# German ("Du")
	'de-at' => 'Österreichisches Deutsch',		# Austrian German
	'de-ch' => 'Schweizer Hochdeutsch',		# Swiss Standard German
	'de-formal' => "\xE2\x80\xAADeutsch (Sie-Form)\xE2\x80\xAC",		# German - formal address ("Sie")
	'diq' => 'Zazaki',		# Zazaki
	'dsb' => 'Dolnoserbski', # Lower Sorbian
	'dtp' => 'Dusun Bundu-liwan', # Central Dusun
	'dv' => 'ދިވެހިބަސް',		# Dhivehi
	'dz' => 'ཇོང་ཁ',		# Bhutani
	'ee' => 'Eʋegbe',	# Éwé
	'el' => 'Ελληνικά',	# Greek
	'eml' => 'Emiliàn e rumagnòl',	# Emiliano-Romagnolo / Sammarinese
	'en' => 'English',		# English
	'en-ca' => 'Canadian English',	# Canadian English
	'en-gb' => 'British English',	# British English
	'eo' => 'Esperanto',	# Esperanto
	'es' => 'Español',	# Spanish
	'et' => 'Eesti',		# Estonian
	'eu' => 'Euskara',		# Basque
	'ext' => 'Estremeñu', # Extremaduran
	'fa' => 'فارسی',	# Persian
	'ff' => 'Fulfulde',		# Fulfulde, Maasina
	'fi' => 'Suomi',		# Finnish
	'fiu-vro' => 'Võro',    # Võro (deprecated code, 'vro' in ISO 639-3 since 2009-01-16)
	'fj' => 'Na Vosa Vakaviti',	# Fijian
	'fo' => 'Føroyskt',	# Faroese
	'fr' => 'Français',	# French
	'frc' => 'Français cadien', # Cajun French
	'frp' => 'Arpetan',	# Franco-Provençal/Arpitan
	'frr' => 'Nordfriisk',	# North Frisian
	'fur' => 'Furlan',		# Friulian
	'fy' => 'Frysk',		# Frisian
	'ga' => 'Gaeilge',		# Irish
	'gag' => 'Gagauz',		# Gagauz
	'gan' => '贛語',		# Gan (multiple scripts - defaults to Traditional)
	'gan-hans' => "\xE2\x80\xAA赣语(简体)\xE2\x80\xAC",	# Gan (Simplified Han)
	'gan-hant' => "\xE2\x80\xAA贛語(繁體)\xE2\x80\xAC",	# Gan (Traditional Han)
	'gd' => 'Gàidhlig',	# Scots Gaelic
	'gl' => 'Galego',		# Galician
	'glk' => 'گیلکی',	# Gilaki
	'gn' => 'Avañe\'ẽ',	# Guaraní, Paraguayan
	'got' => '𐌲𐌿𐍄𐌹𐍃𐌺',	# Gothic
	'grc' => 'Ἀρχαία ἑλληνικὴ', # Ancient Greek
	'gsw' => 'Alemannisch',	# Alemannic
	'gu' => 'ગુજરાતી',	# Gujarati
	'gv' => 'Gaelg',		# Manx
	'ha' => 'هَوُسَ',	# Hausa
	'hak' => 'Hak-kâ-fa',	# Hakka
	'haw' => 'Hawai`i',		# Hawaiian
	'he' => 'עברית',	# Hebrew
	'hi' => 'हिन्दी',	# Hindi
	'hif' => 'Fiji Hindi',	# Fijian Hindi (multiple scripts - defaults to Latin)
	'hif-latn' => 'Fiji Hindi',	# Fiji Hindi (latin)
	'hil' => 'Ilonggo',	# Hiligaynon
	'ho' => 'Hiri Motu',	# Hiri Motu
	'hr' => 'Hrvatski',		# Croatian
	'hsb' => 'Hornjoserbsce',	# Upper Sorbian
	'ht'  => 'Kreyòl ayisyen',		# Haitian Creole French
	'hu' => 'Magyar',		# Hungarian
	'hy' => 'Հայերեն',	# Armenian
	'hz' => 'Otsiherero',	# Herero
	'ia' => 'Interlingua',	# Interlingua (IALA)
	'id' => 'Bahasa Indonesia',	# Indonesian
	'ie' => 'Interlingue',	# Interlingue (Occidental)
	'ig' => 'Igbo',			# Igbo
	'ii' => 'ꆇꉙ',	# Sichuan Yi
	'ik' => 'Iñupiak',	# Inupiak (Inupiatun, Northwest Alaska / Inupiatun, North Alaskan)
	'ike-cans' => 'ᐃᓄᒃᑎᑐᑦ',	# Inuktitut, Eastern Canadian/Eastern Canadian "Eskimo"/"Eastern Arctic Eskimo"/Inuit (Unified Canadian Aboriginal Syllabics)
	'ike-latn' => 'inuktitut',	# Inuktitut, Eastern Canadian (Latin script)
	'ilo' => 'Ilokano',	# Ilokano
	'inh' => 'ГІалгІай Ğalğaj',    # Ingush
	'io' => 'Ido',			# Ido
	'is' => 'Íslenska',	# Icelandic
	'it' => 'Italiano',		# Italian
	'iu' => 'ᐃᓄᒃᑎᑐᑦ/inuktitut',	# Inuktitut (macro language - do no localise, see ike/ikt - falls back to ike-cans)
	'ja' => '日本語',	# Japanese
	'jam' => 'Patois',	# Jamaican Creole English
	'jbo' => 'Lojban',		# Lojban
	'jut' => 'Jysk',	# Jutish / Jutlandic
	'jv' => 'Basa Jawa',	# Javanese
	'ka' => 'ქართული',	# Georgian
	'kaa' => 'Qaraqalpaqsha',	# Karakalpak
	'kab' => 'Taqbaylit',	# Kabyle
	'kbd' => 'Адыгэбзэ',	# Kabardian
	'kbd-cyrl' => 'Адыгэбзэ',	# Kabardian (Cyrillic)
	'kg' => 'Kongo',	# Kongo, (FIXME!) should probaly be KiKongo or KiKoongo
	'khw' => 'کھوار',	# Khowar
	'ki' => 'Gĩkũyũ',	# Gikuyu
	'kiu' => 'Kırmancki',	# Kirmanjki
	'kj' => 'Kwanyama',	# Kwanyama
	'kk' => 'Қазақша',	# Kazakh (multiple scripts - defaults to Cyrillic)
	'kk-arab' => "\xE2\x80\xABقازاقشا (تٴوتە)\xE2\x80\xAC",	# Kazakh Arabic
	'kk-cyrl' => "\xE2\x80\xAAҚазақша (кирил)\xE2\x80\xAC",	# Kazakh Cyrillic
	'kk-latn' => "\xE2\x80\xAAQazaqşa (latın)\xE2\x80\xAC",	# Kazakh Latin
	'kk-cn' => "\xE2\x80\xABقازاقشا (جۇنگو)\xE2\x80\xAC",	# Kazakh (China)
	'kk-kz' => "\xE2\x80\xAAҚазақша (Қазақстан)\xE2\x80\xAC",	# Kazakh (Kazakhstan)
	'kk-tr' => "\xE2\x80\xAAQazaqşa (Türkïya)\xE2\x80\xAC",	# Kazakh (Turkey)
	'kl' => 'Kalaallisut',	# Inuktitut, Greenlandic/Greenlandic/Kalaallisut (kal)
	'km' => 'ភាសាខ្មែរ',	# Khmer, Central
	'kn' => 'ಕನ್ನಡ',	# Kannada
	'ko' => '한국어',	# Korean
	'ko-kp' => '한국어 (조선)',	# Korean (DPRK)
	'koi' => 'Перем Коми', # Komi-Permyak
	'kr' => 'Kanuri',		# Kanuri, Central
	'krc' => 'Къарачай-Малкъар', # Karachay-Balkar
	'kri' => 'Krio', # Krio
	'krj' => 'Kinaray-a', # Kinaray-a
	'ks' => 'कॉशुर - کٲشُر',	# Kashmiri (multiple scripts - defaults to Perso-Arabic)
	'ks-arab' => 'کٲشُر',	# Kashmiri (Perso-Arabic script)
	'ks-deva' => 'कॉशुर',	# Kashmiri (Devanagari script)
	'ksh' => 'Ripoarisch',	# Ripuarian
	'ku'  => 'Kurdî',	# Kurdish (multiple scripts - defaults to Latin)
	'ku-latn' => "\xE2\x80\xAAKurdî (latînî)\xE2\x80\xAC",	# Northern Kurdish (Latin script)
	'ku-arab' => "\xE2\x80\xABكوردي (عەرەبی)\xE2\x80\xAC",	# Northern Kurdish (Arabic script) (falls back to ckb)
	'kv' => 'Коми',	# Komi-Zyrian (Cyrillic is common script but also written in Latin script)
	'kw' => 'Kernowek',		# Cornish
	'ky' => 'Кыргызча',	# Kirghiz
	'la' => 'Latina',		# Latin
	'lad' => 'Ladino',	# Ladino
	'lb' => 'Lëtzebuergesch',	# Luxemburguish
	'lbe' => 'Лакку',	# Lak
	'lez' => 'Лезги',	# Lezgi
	'lfn' => 'Lingua Franca Nova',	# Lingua Franca Nova
	'lg' => 'Luganda',		# Ganda
	'li' => 'Limburgs',	# Limburgian
	'lij' => 'Ligure',	# Ligurian
	'liv' => 'Līvõ kēļ',	# Livonian
	'lmo' => 'Lumbaart',	# Lombard
	'ln' => 'Lingála',		# Lingala
	'lo' => 'ລາວ',# Laotian
	'loz' => 'Silozi', # Lozi
	'lt' => 'Lietuvių',	# Lithuanian
	'ltg' => 'Latgaļu', 	# Latgalian
	'lus' => 'Mizo ţawng', # Mizo/Lushai
	'lv' => 'Latviešu',	# Latvian
	'lzh' => '文言',	# Literary Chinese -- (bug 8217) lzh instead of zh-classical, http://www.sil.org/iso639-3/codes.asp?order=639_3&letter=l
	'lzz' => 'Lazuri',	# Laz
	'mai' => 'मैथिली', # Maithili
	'map-bms' => 'Basa Banyumasan', # Banyumasan
	'mdf' => 'Мокшень',		# Moksha
	'mg' => 'Malagasy',		# Malagasy
	'mh' => 'Ebon',			# Marshallese
	'mhr' => 'Олык Марий',	# Eastern Mari
	'mi' => 'Māori',	# Maori
	'min' => 'Baso Minangkabau',	# Minangkabau
	'mk' => 'Македонски',	# Macedonian
	'ml' => 'മലയാളം',	# Malayalam
	'mn' => 'Монгол',	# Halh Mongolian (Cyrillic) (ISO 639-3: khk)
	'mo' => 'Молдовеняскэ',	# Moldovan
	'mr' => 'मराठी',	# Marathi
	'mrj' => 'Кырык мары',	# Hill Mari
	'ms' => 'Bahasa Melayu',	# Malay
	'mt' => 'Malti',	# Maltese
	'mus' => 'Mvskoke',	# Muskogee/Creek
	'mwl' => 'Mirandés',	# Mirandese
	'my' => 'မြန်မာဘာသာ',		# Burmese
	'myv' => 'Эрзянь',	# Erzya
	'mzn' => 'مازِرونی',		# Mazanderani
	'na' => 'Dorerin Naoero',		# Nauruan
	'nah' => 'Nāhuatl',		# Nahuatl, en:Wikipedia writes Nahuatlahtolli, while another form is Náhuatl
	'nan' => 'Bân-lâm-gú', # Min-nan -- (bug 8217) nan instead of zh-min-nan, http://www.sil.org/iso639-3/codes.asp?order=639_3&letter=n
	'nap' => 'Nnapulitano',	# Neapolitan
	'nb' => "\xE2\x80\xAANorsk (bokmål)\xE2\x80\xAC",		# Norwegian (Bokmal)
	'nds' => 'Plattdüütsch',	# Low German ''or'' Low Saxon
	'nds-nl' => 'Nedersaksisch',	# Dutch Low Saxon
	'ne' => 'नेपाली',	# Nepali
	'new' => 'नेपाल भाषा',		# Newar / Nepal Bhasa
	'ng' => 'Oshiwambo',		# Ndonga
	'niu' => 'Niuē',	# Niuean
	'nl' => 'Nederlands',	# Dutch
	'nl-informal' => "\xE2\x80\xAANederlands (informeel)\xE2\x80\xAC",	# Dutch (informal address ("je"))
	'nn' => "\xE2\x80\xAANorsk (nynorsk)\xE2\x80\xAC",	# Norwegian (Nynorsk)
	'no' => "\xE2\x80\xAANorsk (bokmål)\xE2\x80\xAC",		# Norwegian (falls back to nb).
	'nov' => 'Novial',		# Novial
	'nrm' => 'Nouormand',	# Norman
	'nso' => 'Sesotho sa Leboa',	# Northern Sotho
	'nv' => 'Diné bizaad',	# Navajo
	'ny' => 'Chi-Chewa',	# Chichewa
	'oc' => 'Occitan',		# Occitan
	'om' => 'Oromoo',		# Oromo
	'or' => 'ଓଡ଼ିଆ',		# Oriya
	'os' => 'Ирон', # Ossetic -- fixed per bug 29091
	'pa' => 'ਪੰਜਾਬੀ', # Eastern Punjabi (Gurmukhi script) (pan)
	'pag' => 'Pangasinan',	# Pangasinan
	'pam' => 'Kapampangan',   # Pampanga
	'pap' => 'Papiamentu',	# Papiamentu
	'pcd' => 'Picard',	# Picard
	'pdc' => 'Deitsch',	# Pennsylvania German
	'pdt' => 'Plautdietsch',	# Plautdietsch/Mennonite Low German
	'pfl' => 'Pälzisch',	# Palatinate German
	'pi' => 'पािऴ',	# Pali
	'pih' => 'Norfuk / Pitkern', # Norfuk/Pitcairn/Norfolk
	'pl' => 'Polski',		# Polish
	'pms' => 'Piemontèis',	# Piedmontese
	'pnb' => 'پنجابی',	# Western Punjabi
	'pnt' => 'Ποντιακά',	# Pontic/Pontic Greek
	'prg' => 'Prūsiskan',	# Prussian
	'ps' => 'پښتو',	# Pashto, Northern/Paktu/Pakhtu/Pakhtoo/Afghan/Pakhto/Pashtu/Pushto/Yusufzai Pashto
	'pt' => 'Português',	# Portuguese
	'pt-br' => 'Português do Brasil',	# Brazilian Portuguese
	'qu' => 'Runa Simi',	# Southern Quechua
	'qug' => 'Runa shimi',	# Kichwa/Northern Quechua (one of the codes it covers; temporarily used until Kichwa has its own)
	'rgn' => 'Rumagnôl',	# Romagnol
	'rif' => 'Tarifit',	# Tarifit
	'rm' => 'Rumantsch',	# Raeto-Romance
	'rmy' => 'Romani',	# Vlax Romany
	'rn' => 'Kirundi',		# Rundi/Kirundi/Urundi
	'ro' => 'Română',	# Romanian
	'roa-rup' => 'Armãneashce', # Aromanian (deprecated code, 'rup' exists in ISO 693-3)
	'roa-tara' => 'Tarandíne',	# Tarantino
	'ru' => 'Русский',	# Russian
	'rue' => 'Русиньскый',	# Rusyn
	'rup' => 'Armãneashce', # Aromanian
	'ruq' => 'Vlăheşte',	# Megleno-Romanian (multiple scripts - defaults to Latin)
	'ruq-cyrl' => 'Влахесте',	# Megleno-Romanian (Cyrillic script)
	# 'ruq-grek' => 'Βλαεστε',	# Megleno-Romanian (Greek script)
	'ruq-latn' => 'Vlăheşte',	# Megleno-Romanian (Latin script)
	'rw' => 'Kinyarwanda',	# Kinyarwanda, should possibly be Kinyarwandi
	'sa' => 'संस्कृतम्',	# Sanskrit
	'sah' => 'Саха тыла', # Sakha
	'sc' => 'Sardu',		# Sardinian
	'scn' => 'Sicilianu',	# Sicilian
	'sco' => 'Scots',       # Scots
	'sd' => 'سنڌي',	# Sindhi
	'sdc' => 'Sassaresu',	# Sassarese
	'se' => 'Sámegiella',	# Northern Sami
	'sei' => 'Cmique Itom',	# Seri
	'sg' => 'Sängö',		# Sango/Sangho
	'sgs' => 'Žemaitėška', # Samogitian
	'sh' => 'Srpskohrvatski / Српскохрватски', # Serbocroatian
	'shi' => 'Tašlḥiyt/ⵜⴰⵛⵍⵃⵉⵜ',    # Tachelhit (multiple scripts - defaults to Latin)
	'shi-tfng' => 'ⵜⴰⵛⵍⵃⵉⵜ',    # Tachelhit (Tifinagh script)
	'shi-latn' => 'Tašlḥiyt',    # Tachelhit (Latin script)
	'si' => 'සිංහල',	# Sinhalese
	'simple' => 'Simple English',	# Simple English
	'sk' => 'Slovenčina',	# Slovak
	'sl' => 'Slovenščina',	# Slovenian
	'sli' => 'Schläsch',	# Lower Selisian
	'sm' => 'Gagana Samoa',	# Samoan
	'sma' => 'Åarjelsaemien',	# Southern Sami
	'sn' => 'chiShona',		# Shona
	'so' => 'Soomaaliga',	# Somali
	'sq' => 'Shqip',		# Albanian
	'sr' => 'Српски / Srpski',	# Serbian (multiple scripts - defaults to Cyrillic)
	'sr-ec' => "\xE2\x80\xAAСрпски (ћирилица)\xE2\x80\xAC",	# Serbian Cyrillic ekavian
	'sr-el' => "\xE2\x80\xAASrpski (latinica)\xE2\x80\xAC",	# Serbian Latin ekavian
	'srn' => 'Sranantongo',		# Sranan Tongo
	'ss' => 'SiSwati',		# Swati
	'st' => 'Sesotho',		# Southern Sotho
	'stq' => 'Seeltersk',		# Saterland Frisian
	'su' => 'Basa Sunda',	# Sundanese
	'sv' => 'Svenska',		# Swedish
	'sw' => 'Kiswahili',	# Swahili
	'szl' => 'Ślůnski',	# Silesian
	'ta' => 'தமிழ்',	# Tamil
	'tcy' => 'ತುಳು', # Tulu
	'te' => 'తెలుగు',	# Telugu
	'tet' => 'Tetun',	# Tetun
	'tg' => 'Тоҷикӣ',	# Tajiki (falls back to tg-cyrl)
	'tg-cyrl' => 'Тоҷикӣ',	# Tajiki (Cyrllic script) (default)
	'tg-latn' => 'tojikī',	# Tajiki (Latin script)
	'th' => 'ไทย',	# Thai
	'ti' => 'ትግርኛ',		# Tigrinya
	'tk' => 'Türkmençe',	# Turkmen
	'tl' => 'Tagalog',		# Tagalog
	'tly' => 'толышә зывон',	# Talysh
	'tn' => 'Setswana',		# Setswana
	'to' => 'lea faka-Tonga',		# Tonga (Tonga Islands)
	'tokipona' => 'Toki Pona',      # Toki Pona
	'tpi' => 'Tok Pisin',	# Tok Pisin
	'tr' => 'Türkçe',	# Turkish
	'ts' => 'Xitsonga',		# Tsonga
	'tt' => 'Татарча/Tatarça',	# Tatar (multiple scripts - defaults to Cyrillic)
	'tt-cyrl' => 'Татарча',	# Tatar (Cyrillic script) (default)
	'tt-latn' => 'Tatarça',	# Tatar (Latin script)
	'tum' => 'chiTumbuka',  # Tumbuka
	'tw' => 'Twi',			# Twi, (FIXME!)
	'ty' => 'Reo Mā`ohi',	# Tahitian
	'tyv' => 'Тыва дыл',	# Tyvan
	'udm' => 'Удмурт',	# Udmurt
	'ug' => 'ئۇيغۇرچە / Uyghurche‎',	# Uyghur (multiple scripts - defaults to Arabic)
	'ug-arab' => 'ئۇيغۇرچە', # Uyghur (Arabic script) (default)
	'ug-latn' => 'Uyghurche‎', # Uyghur (Latin script)
	'uk' => 'Українська',	# Ukrainian
	'ur' => 'اردو',	# Urdu
	'uz' => 'O\'zbek',	# Uzbek
	've' => 'Tshivenda',		# Venda
	'vec' => 'Vèneto',	# Venetian
	'vep' => 'Vepsän kel\'',	# Veps
	'vi' => 'Tiếng Việt',	# Vietnamese
	'vls' => 'West-Vlams', # West Flemish
	'vmf' => 'Mainfränkisch', # Upper Franconian, Main-Franconian
	'vo' => 'Volapük',	# Volapük
	'vot' => 'Vaďďa',	# Vod/Votian
	'vro' => 'Võro',    # Võro
	'wa' => 'Walon',		# Walloon
	'war' => 'Winaray', # Waray-Waray
	'wo' => 'Wolof',		# Wolof
	'wuu' => '吴语',		# Wu Chinese
	'xal' => 'Хальмг',		# Kalmyk-Oirat (Kalmuk, Kalmuck, Kalmack, Qalmaq, Kalmytskii Jazyk, Khal:mag, Oirat, Volga Oirat, European Oirat, Western Mongolian)
	'xh' => 'isiXhosa',		# Xhosan
	'xmf' => 'მარგალური',	# Mingrelian
	'yi' => 'ייִדיש',	# Yiddish
	'yo' => 'Yorùbá',	# Yoruba
	'yue' => '粵語',	# Cantonese -- (bug 8217) yue instead of zh-yue, http://www.sil.org/iso639-3/codes.asp?order=639_3&letter=y
	'za' => 'Vahcuengh',	# Zhuang
	'zea' => 'Zeêuws',	# Zeeuws/Zeaws
	'zh' => '中文',						# (Zhōng Wén) - Chinese
	'zh-classical' => '文言',			# Classical Chinese/Literary Chinese -- (see bug 8217)
	'zh-cn' => "\xE2\x80\xAA中文(中国大陆)\xE2\x80\xAC",	# Chinese (PRC)
	'zh-hans' => "\xE2\x80\xAA中文(简体)\xE2\x80\xAC",	# Mandarin Chinese (Simplified Chinese script) (cmn-hans)
	'zh-hant' => "\xE2\x80\xAA中文(繁體)\xE2\x80\xAC",	# Mandarin Chinese (Traditional Chinese script) (cmn-hant)
	'zh-hk' => "\xE2\x80\xAA中文(香港)\xE2\x80\xAC",	# Chinese (Hong Kong)
	'zh-min-nan' => 'Bân-lâm-gú',				# Min-nan -- (see bug 8217)
	'zh-mo' => "\xE2\x80\xAA中文(澳門)\xE2\x80\xAC",	# Chinese (Macau)
	'zh-my' => "\xE2\x80\xAA中文(马来西亚)\xE2\x80\xAC",	# Chinese (Malaysia)
	'zh-sg' => "\xE2\x80\xAA中文(新加坡)\xE2\x80\xAC",	# Chinese (Singapore)
	'zh-tw' => "\xE2\x80\xAA中文(台灣)\xE2\x80\xAC",	# Chinese (Taiwan)
	'zh-yue' => '粵語',					# Cantonese -- (see bug 8217)
	'zu' => 'isiZulu'		# Zulu
);

# Setup

$wgExtensionFunctions[] = 'wfLangUtilsSetup';

function wfLangUtilsSetup() {

	global
		$wgLangUtils_LangSwitch,
		$wgLangUtils_SidebarList,
		$wgLangUtils_PageClass,
		$wgLangUtils_ChangeAnonLang,

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
		if ( $wgLangUtils_ChangeAnonLang ) {
			$wgHooks['PageContentLanguage'][] = 'ExtLangUtils::changePageLang';
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
			
			# Needed to do this to overcome issue:
			# "Only variables can be passed by reference"
			$fparts = explode( ' ', $title );
			$end = end( $fparts );

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
	
	public static function setLang( &$parserOrTitle, $isTitle = false ) {
		if ( $isTitle ) {
			$title = $parserOrTitle;
		}
		else {
			$title = $parserOrTitle->getTitle();
		}
		if ( !isset( $title->mPageLang ) ) {
			$title->mPageLang = ExtLangUtils::getLang( $title->mTextform, $title->mNamespace );
		}
		return true;
	}

	# Double functionality: returns magic word values, and parser function values.
	# In default set, {{FULLPAGENAME}} is a magic word, whereas {{FULLPAGENAME:Page}}
	# is a parser function. This aims to achieve the same end similarly.
	public static function getVariableValue( &$parser, &$cache, &$magicWordId, &$ret ) {
		ExtLangUtils::setLang( $parser );
		switch ( $magicWordId ) {
			case 'pagelang':
				$ret = ExtLangUtils::pagelang( $parser );
				break;
			case 'pagelangsuffix':
				$ret = ExtLangUtils::pagelangsuffix( $parser );
				break;
			default:
				$ret = '';
				break;
		}
		return true;
	}

	# Simply return the page language.
	# If it is set already, reuse. If not, regrab from title.
	public static function pagelang( $parser, $custom = null ) {
		if ( is_null( $custom ) ) {
			ExtLangUtils::setLang( $parser );
			return $parser->getTitle()->mPageLang;
		}
		else {
			$c = Title::newFromText( $custom );
			return ExtLangUtils::getLang( $c );
		}
	}

	# Returns '' for en pages and '/xx' for language pages.
	# Replacement for {{if lang}} templates.
	public static function pagelangsuffix( $parser, $custom = null ) {
		if ( is_null( $custom ) ) {
			ExtLangUtils::setLang( $parser );
			$lang = $parser->getTitle()->mPageLang;
		}
		else {
			$c = Title::newFromText( $custom );
			$lang = ExtLangUtils::getLang( $c );
		}

		if ( $lang == 'en' ) {
			return '';
		}
		else {
			return '/' . $lang;
		}
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

	## Change language to mPageLang if the user is anonymous.
	public static function changePageLang( $title, &$pageLang, $wgLang ) {
		global $wgUser;
		ExtLangUtils::setLang( $title, true );
		if ( $wgUser->isAnon() ) {
			$lang = $title->mPageLang;
			if ( $lang !== 'en' ) {
				$pageLang->setCode( $lang );
			}
		}
		return true;
	}

	##
	## Skin functions
	##

	public static function skinAddSidebar( $skin, &$bar ) {
		global $wgContLang, $wgAllowedLanguages, $wgLangUtils_SidebarList_NS, $coreLanguageNames_titlecase;

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

			# Save the page language for the <body> function, or other skin
			# functions that may need it later.
			$skin->sPageLang = $pageLang;

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
					$localname = isset($coreLanguageNames_titlecase[$lang]) ? $coreLanguageNames_titlecase[$lang] : $lang;
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

		if ( isset( $skin->sPageLang ) ) {
			$pageLang = $skin->sPageLang;
		}
		else {
			$pageLang = ExtLangUtils::getLang( $out->mPagetitle, $out->getTitle()->mNamespace );
			$skin->sPageLang = $pageLang;
		}
		$bodyAttrs['class'] .= ' pagelang-' . $pageLang;

		return true;
	}
}
