<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "handlebars_content".
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
    'title' => 'Handlebars Content Element',
    'description' => 'Provides a content object for the TYPO3 CMS, which can be rendered using handlebars templates.',
    'category' => '',
    'author' => 'Dirk Wenzel',
    'author_email' => 'der-wenzel@gmx.de',
    'state' => 'alpha',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'version' => '0.1.0',
    'constraints' =>
        array (
            'depends' =>
                array (
                    'php' => '7.0.0-0.0.0',
                    'typo3' => '8.7.2-0.0.0',
                    'extbase' => '8.7.0-0.0.0',
                    'handlebars' => '1.0.0-0.0.0'
                ),
            'conflicts' =>
                array (
                ),
            'suggests' =>
                array (
                ),
        ),
    '_md5_values_when_last_written' => 'a:0:{}',
);
