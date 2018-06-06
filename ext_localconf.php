<?php

if (!defined('TYPO3_MODE')) {
    die ('Access denied');
}

//Registration default configuration file for CKEditor
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['FGPDefault'] = 'EXT:' . $_EXTKEY . '/Configuration/RTE/Default.yaml';
// Add default Page Tsconfig
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:fgp_template/Configuration/TSconfig/_Default/Page.typoscript">');

// Register custom content element HANDLEBARS
$GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects'] = \array_merge($GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects'], [
    'HANDLEBARSTEMPLATE' => \DWenzel\HandlebarsContent\ContentObject\HandlebarsContentObject::class,
]);