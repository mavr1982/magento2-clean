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
 * Banner Abstract Action
 * @category Mavgento
 * @package  Mavgento_Custombanner
 * @module   Custombanner
 * @author   Mavgento Developer
 */
abstract class Banner extends \Mavgento\Custombanner\Controller\Adminhtml\AbstractAction
{
    const PARAM_CRUD_ID = 'banner_id';

    /**
     * Check if admin has permissions to visit related pages.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Mavgento_Custombanner::custombanner_banners');
    }

    /**
     * Get back result redirect after add/edit.
     *
     * @param \Magento\Framework\Controller\Result\Redirect $resultRedirect
     * @param null                                          $paramCrudId
     *
     * @return \Magento\Framework\Controller\Result\Redirect
     */
    protected function _getBackResultRedirect(\Magento\Framework\Controller\Result\Redirect $resultRedirect, $paramCrudId = null)
    {
        switch ($this->getRequest()->getParam('back')) {
            case 'edit':
                $resultRedirect->setPath(
                    '*/*/edit',
                    [
                        static::PARAM_CRUD_ID => $paramCrudId,
                        '_current' => true,
                        'store' => $this->getRequest()->getParam('store'),
                        'current_slider_id' => $this->getRequest()->getParam('current_slider_id'),
                        'saveandclose' => $this->getRequest()->getParam('saveandclose'),
                    ]
                );
                break;
            case 'new':
                $resultRedirect->setPath('*/*/new', ['_current' => true]);
                break;
            default:
                $resultRedirect->setPath('*/*/');
        }

        return $resultRedirect;
    }
}
