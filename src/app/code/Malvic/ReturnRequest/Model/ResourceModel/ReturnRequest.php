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
        $this->_init("malvic_return_request", "return_id");
    }
}
