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
namespace Malvic\ReturnRequest\Controller\Request;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;
use \Magento\Customer\Model\Session;

class Index extends Action
{
    /**
     * Dependency Initilization
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param Session $customerSession
     */
    public function __construct(
        Context $context,
        protected PageFactory $resultPageFactory,
        protected Session $customerSession
    ) {
        parent::__construct($context);
    }

    /**
     * Execute
     *
     * @return \Magento\Framework\View\Result\Page|\Magento\Framework\App\ResponseInterface
     */
    public function execute()
    {
        if (!$this->customerSession->isLoggedIn()) {
            return $this->_redirect('customer/account/login');
        }
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('My Returns'));
        return $resultPage;
    }
}
