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

    /**
     * Init Select
     *
     * @return $this
     */
    protected function _initSelect()
    {
        parent::_initSelect();
        $this->getSelect()->joinLeft(
            ['ce' => $this->getTable('customer_entity')],
            'main_table.customer_id = ce.entity_id',
            ['customer_email' => 'email']
        );
        $this->addFilterToMap('customer_email', 'ce.email');
        return $this;
    }
}

