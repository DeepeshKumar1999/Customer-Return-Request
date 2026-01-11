<?php
namespace Vendor\ReturnRequest\Model\ResourceModel\ReturnStatusHistory;

/**
 * ReturnStatusHistory Collection Class
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';

    /**
     * Initialize resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(
            \Vendor\ReturnRequest\Model\ReturnStatusHistory::class,
            \Vendor\ReturnRequest\Model\ResourceModel\ReturnStatusHistory::class
        );
        $this->_map['fields']['entity_id'] = 'main_table.entity_id';
    }
}
