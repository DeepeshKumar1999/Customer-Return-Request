<?php
namespace Vendor\ReturnRequest\Block\Request;

use Magento\Framework\View\Element\Template;
use Magento\Customer\Model\Session;
use \Vendor\ReturnRequest\Helper\Data as HelperData;

class Form extends Template
{
    public function __construct(
        Template\Context $context,
        protected Session $customerSession,
        protected HelperData $helper,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function getOrderId()
    {
        return (int)$this->getRequest()->getParam('order_id');
    }

    public function getPostUrl()
    {
        return $this->getUrl('returnrequest/request/save');
    }

    public function getAllowedImageTypes()
    {
        $types = $this->helper->getAllowedImageTypes();
        if (empty($types)) {
            return '';
        }
        return implode(',', $types);
    }
}
