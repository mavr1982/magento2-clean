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
 * Delete Slider action
 * @category Mavgento
 * @package  Mavgento_Custombanner
 * @module   Custombanner
 * @author   Mavgento Developer
 */
class Delete extends \Mavgento\Custombanner\Controller\Adminhtml\Slider
{
    public function execute()
    {
        $sliderId = $this->getRequest()->getParam(static::PARAM_CRUD_ID);
        try {
            $slider = $this->_sliderFactory->create()->setId($sliderId);
            $slider->delete();
            $this->messageManager->addSuccess(
                __('Delete successfully !')
            );
        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
        }
        $resultRedirect = $this->resultRedirectFactory->create();

        return $resultRedirect->setPath('*/*/');
    }
}
