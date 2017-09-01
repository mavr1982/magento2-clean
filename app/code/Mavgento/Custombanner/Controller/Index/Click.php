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

namespace Mavgento\Custombanner\Controller\Index;

/**
 * Click action
 * @category Mavgento
 * @package  Mavgento_Custombanner
 * @module   Custombanner
 * @author   Mavgento Developer
 */
class Click extends \Mavgento\Custombanner\Controller\Index
{
    /**
     * Default customer account page.
     */
    public function execute()
    {
        $resultRaw = $this->_resultRawFactory->create();
        $userCode = $this->getUserCode(null);
        $date = $this->_stdTimezone->date()->format('Y-m-d');
        $sliderId = $this->getRequest()->getParam('slider_id');
        $bannerId = $this->getRequest()->getParam('banner_id');
        $slider = $this->_sliderFactory->create()->load($sliderId);
        $banner = $this->_bannerFactory->create()->load($bannerId);

        if ($banner->getId() && $slider->getId()) {
            if ($this->getCookieManager()->getCookie('custombanner_user_code_click'.$bannerId) === null) {
                $this->getCookieManager()->setPublicCookie('custombanner_user_code_click'.$bannerId, $userCode);
                $reportCollection = $this->_reportCollectionFactory->create()
                    ->addFieldToFilter('date_click', $date)
                    ->addFieldToFilter('slider_id', $sliderId)
                    ->addFieldToFilter('banner_id', $bannerId)
                    ->setPageSize(1)->setCurPage(1);

                if ($reportCollection->getSize()) {
                    $reportFirstItem = $reportCollection->getFirstItem();
                    $reportFirstItem->setClicks($reportFirstItem->getClicks() + 1);
                    try {
                        $reportFirstItem->save();
                    } catch (\Exception $e) {
                        $this->_monolog->addError($e->getMessage());
                    }
                } else {
                    $report = $this->_reportFactory->create()
                        ->setBannerId($banner->getId())
                        ->setSliderId($slider->getId())
                        ->setClicks(1)
                        ->setData('date_click', $date);
                    try {
                        $report->save();
                    } catch (\Exception $e) {
                        $this->_monolog->addError($e->getMessage());
                    }
                }
            }
        }

        return $resultRaw;
    }
}
