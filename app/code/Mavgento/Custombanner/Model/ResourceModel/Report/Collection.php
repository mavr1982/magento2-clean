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

namespace Mavgento\Custombanner\Model\ResourceModel\Report;

/**
 * Report Collection
 * @category Mavgento
 * @package  Mavgento_Custombanner
 * @module   Custombanner
 * @author   Mavgento Developer
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    const REPORT_TYPE_ALL_SLIDER = '1';
    const REPORT_TYPE_PER_SLIDER = '2';


    protected $_idFieldName = 'report_id';
    /**
     * store view id.
     *
     * @var int
     */
    protected $_storeViewId = null;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * added table
     * @var array
     */
    protected $_addedTable = [];

    /**
     * @var bool
     */
    protected $_isLoadSliderTitle = FALSE;

    /**
     * @var \Magento\Framework\Stdlib\DateTime\Timezone
     */
    protected $_stdTimezone;

    /**
     * _contruct
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Mavgento\Custombanner\Model\Report', 'Mavgento\Custombanner\Model\ResourceModel\Report');
    }

    /**
     * @param \Magento\Framework\Data\Collection\EntityFactoryInterface    $entityFactory
     * @param \Psr\Log\LoggerInterface                                     $logger
     * @param \Magento\Framework\Data\Collection\Db\FetchStrategyInterface $fetchStrategy
     * @param \Magento\Framework\Event\ManagerInterface                    $eventManager
     * @param \Zend_Db_Adapter_Abstract                                    $connection
     * @param \Magento\Framework\Model\ResourceModel\Db\AbstractDb              $resource
     */
    public function __construct(
        \Magento\Framework\Data\Collection\EntityFactoryInterface $entityFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\Data\Collection\Db\FetchStrategyInterface $fetchStrategy,
        \Magento\Framework\Event\ManagerInterface $eventManager,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Stdlib\DateTime\Timezone $stdTimezone,
        $connection = null,
        \Magento\Framework\Model\ResourceModel\Db\AbstractDb $resource = null
    ) {
        parent::__construct($entityFactory, $logger, $fetchStrategy, $eventManager, $connection, $resource);
        $this->_storeManager = $storeManager;
        $this->_stdTimezone = $stdTimezone;

    }


    /**
     * load slider and banner information to report
     */
    public function reportClickAndImpress($reportType)
    {
        $this->getSelect()->joinLeft(
            ['table_banner' => $this->getTable('mavgento_custombanner_banner')],
            'main_table.banner_id = table_banner.banner_id',
            ['banner_name' => 'table_banner.name', 'banner_url' => 'table_banner.click_url']
        )->joinLeft(
            ['table_slider' => $this->getTable('mavgento_custombanner_slider')],
            'main_table.slider_id = table_slider.slider_id',
            ['slider_title' => 'table_slider.title']
        )->columns('SUM(main_table.clicks) AS banner_click')
            ->columns('SUM(main_table.impmode) AS banner_impress');

        if ($reportType == self::REPORT_TYPE_ALL_SLIDER) {
            $this->getSelect()->group('main_table.banner_id');
        } else if ($reportType == self::REPORT_TYPE_PER_SLIDER) {
            $this->getSelect()->group('main_table.slider_id')
                ->group('main_table.banner_id');
        }

        return $this;
    }
}
