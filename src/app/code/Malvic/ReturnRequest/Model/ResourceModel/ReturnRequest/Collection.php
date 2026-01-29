<?php
/**
 * Malvic Software Private Limited
 *
 * @author    Malvic Software Private Limited
 * @copyright Malvic Software Private Limited
 * @license   Malvic Software Private Limited
 */
namespace Malvic\ReturnRequest\Model\ResourceModel\ReturnRequest;

/**
 * ReturnRequest Collection Class
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'return_id';

    /**
     * Initialize resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(
            \Malvic\ReturnRequest\Model\ReturnRequest::class,
            \Malvic\ReturnRequest\Model\ResourceModel\ReturnRequest::class
        );
        $this->_map['fields']['entity_id'] = 'main_table.return_id';
    }

    /**
     * Init Select
     *
     * @return \Malvic\ReturnRequest\Model\ResourceModel\ReturnRequest\Collection
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
