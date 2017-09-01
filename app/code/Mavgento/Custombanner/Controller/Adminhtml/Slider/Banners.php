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

namespace Mavgento\Custombanner\Controller\Adminhtml\Slider;

/**
 * Banners of slider action
 * @category Mavgento
 * @package  Mavgento_Custombanner
 * @module   Custombanner
 * @author   Mavgento Developer
 */
class Banners extends \Mavgento\Custombanner\Controller\Adminhtml\Slider
{
    public function execute()
    {
        $resultLayout = $this->_resultLayoutFactory->create();
        $resultLayout->getLayout()->getBlock('custombanner.slider.edit.tab.banners')
                     ->setInBanner($this->getRequest()->getPost('banner', null));

        return $resultLayout;
    }
}
