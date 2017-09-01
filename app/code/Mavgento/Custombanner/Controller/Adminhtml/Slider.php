<?php

/**
 * Mavgento
 *
 *
 *
 * @category    Mavgento
 * @package     Mavgento_Custombanner
 * @copyright   
 * @license     
 */

namespace Mavgento\Custombanner\Controller\Adminhtml;

/**
 * Slider Abstract Action
 * @category Mavgento
 * @package  Mavgento_Custombanner
 * @module   Custombanner
 * @author   Mavgento Developer
 */
abstract class Slider extends \Mavgento\Custombanner\Controller\Adminhtml\AbstractAction
{
    const PARAM_CRUD_ID = 'slider_id';

    /**
     * Check if admin has permissions to visit related pages.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Mavgento_Custombanner::custombanner_sliders');
    }
}
