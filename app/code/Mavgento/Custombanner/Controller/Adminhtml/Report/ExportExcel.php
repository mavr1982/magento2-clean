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

namespace Mavgento\Custombanner\Controller\Adminhtml\Report;

use Magento\Framework\App\Filesystem\DirectoryList;

/**
 * ExportExcel action.
 * @category Mavgento
 * @package  Mavgento_Custombanner
 * @module   Custombanner
 * @author   Mavgento Developer
 */
class ExportExcel extends \Mavgento\Custombanner\Controller\Adminhtml\Report
{
    public function execute()
    {
        $fileName = 'reports.xls';

        /** @var \\Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $content = $resultPage->getLayout()->createBlock('Mavgento\Custombanner\Block\Adminhtml\Report\Grid')->getExcel();

        return $this->_fileFactory->create($fileName, $content, DirectoryList::VAR_DIR);
    }
}
