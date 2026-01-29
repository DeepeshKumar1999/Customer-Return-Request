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
namespace Malvic\ReturnRequest\Block\Request;

use \Magento\Framework\View\Element\Template;
use \Magento\Customer\Model\Session;
use \Malvic\ReturnRequest\Helper\Data as HelperData;

class Form extends Template
{
    /**
     * Dependency Initilization
     *
     * @param Template\Context $context
     * @param Session $customerSession
     * @param HelperData $helper
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        protected Session $customerSession,
        protected HelperData $helper,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * Get Order Id
     *
     * @return int
     */
    public function getOrderId()
    {
        return (int)$this->getRequest()->getParam('order_id');
    }

    /**
     * Get Post Url
     *
     * @return string
     */
    public function getPostUrl()
    {
        return $this->getUrl('returnrequest/request/save');
    }

    /**
     * Get Allowed Image Types
     *
     * @return string
     */
    public function getAllowedImageTypes()
    {
        $types = $this->helper->getAllowedImageTypes();
        if (empty($types)) {
            return '';
        }
        return implode(',', $types);
    }

    /**
     * Get Return Reason List
     *
     * @return array
     */
    public function getReturnReasonList()
    {
        return $this->helper->getReturnReasonList();
    }
}
