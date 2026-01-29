<?php
/**
 * Malvic Software Private Limited
 *
 * @author    Malvic Software Private Limited
 * @copyright Malvic Software Private Limited
 * @license   Malvic Software Private Limited
 */
namespace Malvic\ReturnRequest\Model\ResourceModel;

/**
 * ReturnStatusHistory RosourceModel Class
 */
class ReturnStatusHistory extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init("malvic_return_status_history", "entity_id");
    }
}
