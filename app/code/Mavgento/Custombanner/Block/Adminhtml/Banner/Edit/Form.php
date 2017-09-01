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

namespace Mavgento\Custombanner\Block\Adminhtml\Banner\Edit;

/**
 * Adminhtml locator edit form block.
 * @category Mavgento
 * @package  Mavgento_Custombanner
 * @module   Custombanner
 * @author   Mavgento Developer
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    protected function _prepareForm()
    {
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            array(
                'data' => array(
                    'id' => 'edit_form',
                    'action' => $this->getUrl('*/*/save', ['store' => $this->getRequest()->getParam('store')]),
                    'method' => 'post',
                    'enctype' => 'multipart/form-data',
                ),
            )
        );
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
