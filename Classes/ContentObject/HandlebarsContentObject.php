<?php

namespace DWenzel\HandlebarsContent\ContentObject;


/**
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use DWenzel\HandlebarsContent\View\StandaloneView;
use TYPO3\CMS\Core\TypoScript\TypoScriptService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\AbstractContentObject;
use TYPO3\CMS\Frontend\ContentObject\ContentDataProcessor;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * Class HandlebarsContentObject
 * Renders a content object using handlebars templates
 */
class HandlebarsContentObject extends AbstractContentObject
{
    const VARIABLES_KEY = 'variables';

    /**
     * @var StandaloneView
     */
    protected $view = null;

    /**
     * @var ContentDataProcessor
     */
    protected $contentDataProcessor;

    /**
     * @var TypoScriptService
     */
    protected $typoScriptService;

    /**
     * @var array
     */
    protected $settings = [];

    /**
     * @param ContentObjectRenderer $cObj
     */
    public function __construct(ContentObjectRenderer $cObj)
    {
        parent::__construct($cObj);
        $this->contentDataProcessor = GeneralUtility::makeInstance(ContentDataProcessor::class);
        $this->typoScriptService = GeneralUtility::makeInstance(TypoScriptService::class);
    }

    /**
     * @param ContentDataProcessor $contentDataProcessor
     */
    public function setContentDataProcessor($contentDataProcessor)
    {
        $this->contentDataProcessor = $contentDataProcessor;
    }

    /**
     * Rendering the cObject, HANDLEBARSTEMPLATE
     *
     * Example:
     * 10 = HANDLEBARSTEMPLATE
     * 10.templateName = MyTemplate
     * 10.templateRootPaths.10 = EXT:site_configuration/Resources/Private/Templates/
     * 10.partialRootPaths.10 = EXT:site_configuration/Resources/Private/Patials/
     * 10.layoutRootPaths.10 = EXT:site_configuration/Resources/Private/Layouts/
     * 10.variables {
     *   mylabel = TEXT
     *   mylabel.value = Label from TypoScript coming
     * }
     *
     * @param array $conf Array of TypoScript properties
     * @return string The HTML output
     */

    public function render($conf = [])
    {
        if (!is_array($conf)) {
            $conf = [];
        }
        $settings = $this->typoScriptService->convertTypoScriptArrayToPlainArray($conf);
        $variables = [];

        if (isset($settings[static::VARIABLES_KEY])) {
            $variables = $settings[static::VARIABLES_KEY];
            unset($settings[static::VARIABLES_KEY]);
        }
        $variables['data'] = $this->cObj->data;
        $variables = $this->contentDataProcessor->process($this->cObj, $conf, $variables);
        $this->settings = $settings;
        $this->initializeViewInstance();

        $this->view->assignMultiple(
            $this->typoScriptService->convertTypoScriptArrayToPlainArray($variables)
        );

        return $this->view->render();
    }

    protected function initializeViewInstance()
    {
        $this->view = GeneralUtility::makeInstance(StandaloneView::class, $this->settings);
    }
}