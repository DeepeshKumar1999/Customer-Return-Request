<?php
/**
 * Malvic Software Private Limited
 *
 * @author    Malvic Software Private Limited
 * @copyright Malvic Software Private Limited
 * @license   Malvic Software Private Limited
 */
namespace Malvic\ReturnRequest\Model\ResourceModel\ReturnStatusHistory;

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
            \Malvic\ReturnRequest\Model\ReturnStatusHistory::class,
            \Malvic\ReturnRequest\Model\ResourceModel\ReturnStatusHistory::class
        );
        $this->_map['fields']['entity_id'] = 'main_table.entity_id';
    }
}
