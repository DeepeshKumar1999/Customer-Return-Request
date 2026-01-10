<?php
namespace Vendor\ReturnRequest\Model\ResourceModel\ReturnRequest;

/**
 * ReturnRequest Collection Class
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'return_id';

    /**
     * Initialize resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(
            \Vendor\ReturnRequest\Model\ReturnRequest::class,
            \Vendor\ReturnRequest\Model\ResourceModel\ReturnRequest::class
        );
        $this->_map['fields']['entity_id'] = 'main_table.return_id';
    }
}

