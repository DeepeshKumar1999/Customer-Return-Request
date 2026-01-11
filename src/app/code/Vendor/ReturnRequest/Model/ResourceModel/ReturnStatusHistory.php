<?php
namespace Vendor\ReturnRequest\Model\ResourceModel;

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
        $this->_init("vendor_return_status_history", "entity_id");
    }
}
