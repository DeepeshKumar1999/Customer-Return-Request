<?php
namespace Vendor\ReturnRequest\Model\ResourceModel;

/**
 * ReturnRequest RosourceModel Class
 */
class ReturnRequest extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init("vendor_return_request", "return_id");
    }
}

