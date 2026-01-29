<?php
/**
 * Malvic Software Private Limited
 *
 * Proprietary and Confidential
 *
 * This software is the exclusive property of Malvic Software Private Limited.
 * Unauthorized copying, modification, distribution, or use of this software,
 * via any medium, is strictly prohibited.
 *
 * This software is intended for use only by Malvic Software Private Limited
 * for its own commercial and internal purposes.
 *
 * © Malvic Software Private Limited. All rights reserved.
 *
 * @author    Malvic Software Private Limited
 * @copyright © Malvic Software Private Limited
 * @license   Proprietary – All Rights Reserved
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
