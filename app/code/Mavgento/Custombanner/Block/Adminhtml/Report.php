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
namespace Mavgento\Custombanner\Block\Adminhtml;
/**
 * Report grid container.
 * @category Mavgento
 * @package  Mavgento_Custombanner
 * @module   Custombanner
 * @author   Mavgento Developer
 */
class Report extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor.
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_report';
        $this->_blockGroup = 'Mavgento_Custombanner';
        $this->_headerText = __('Reports');
        parent::_construct();
        $this->removeButton('add');
    }
}