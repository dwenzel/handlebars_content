<?php

if (!defined('TYPO3_MODE')) {
    die ('Access denied');
}

// Register custom content element HANDLEBARS
$GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects'] = \array_merge($GLOBALS['TYPO3_CONF_VARS']['FE']['ContentObjects'], [
    'HANDLEBARSTEMPLATE' => \DWenzel\HandlebarsContent\ContentObject\HandlebarsContentObject::class,
]);