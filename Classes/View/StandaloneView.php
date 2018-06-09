<?php
namespace DWenzel\HandlebarsContent\View;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use JFB\Handlebars\Engine\HandlebarsEngine;
use TYPO3\CMS\Extbase\Mvc\View\AbstractView;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Fabien Udriot <fabien.udriot@visol.ch>, Visol digitale Dienstleistungen GmbH
 *  (c) 2017 Alessandro Bellafronte <alessandro@4eyes.ch>, 4eyes GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/
class StandaloneView extends AbstractView
{
    /**
     * @var array $settings
     */
    protected $settings = [
        'extensionKey' => null,
        'controllerName' => null,
        'actionName' => null,
        'templatePath' => null,
        'tempPath' => 'typo3temp/var/Cache/Code/handlebars_template/',
        'dataProviders' => [],
        'additionalData' => [],
        ];

    /**
     * StandaloneView constructor.
     * @param array $settings
     */
    public function __construct(array $settings = [])
    {
        $this->settings = array_replace_recursive($this->settings, $settings);
    }

    /**
     * Render method of the view (entry point)
     *
     * @return mixed
     */
    public function render()
    {
        $engineSettings = $this->settings;
        $engineSettings['additionalData'] = $this->variables;

        /** @var HandlebarsEngine $handlebarsEngine */
        $handlebarsEngine = GeneralUtility::makeInstance(
            HandlebarsEngine::class,
            $engineSettings
        );

        return $handlebarsEngine->compile();
    }
}
