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

namespace Mavgento\Custombanner\Model\ResourceModel\Banner\Grid;

/**
 * Class StatusesArray
 * @package Mavgento\Affiliateplusprogram\Model\ResourceModel\Program\Grid
 */
class StatusesArray implements \Magento\Framework\Option\ArrayInterface
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 2;

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
            self::STATUS_ENABLED => __('Enabled')
            , self::STATUS_DISABLED => __('Disabled'),
        ];
    }
}
