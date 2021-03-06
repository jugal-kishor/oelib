<?php
/*
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
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * This view helper converts strings to uppercase.
 *
 *
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class Tx_Oelib_ViewHelpers_UppercaseViewHelper extends AbstractViewHelper
{
    /**
     * Converts the rendered children to uppercase.
     *
     * @return string the uppercased rendered children, might be empty
     */
    public function render()
    {
        $renderedChildren = $this->renderChildren();
        $encoding = mb_detect_encoding($renderedChildren);

        return mb_strtoupper($renderedChildren, $encoding);
    }
}
