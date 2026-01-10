<?php
namespace Vendor\ReturnRequest\Controller\Request;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Customer\Model\Session;
use Vendor\ReturnRequest\Api\ReturnRequestRepositoryInterface;

class View extends Action
{
    public function __construct(
        Context $context,
        protected Session $customerSession,
        protected PageFactory $resultPageFactory,
        protected ReturnRequestRepositoryInterface $returnRequestRepositoryInterface
    ) {
        parent::__construct($context);
    }

    public function execute()
    {
        if (!$this->customerSession->isLoggedIn()) {
            return $this->_redirect('customer/account/login');
        }
        $returnId = (int)$this->getRequest()->getParam('return_id');
        if (!$returnId) {
            $this->messageManager->addErrorMessage(__('Invalid return request.'));
            return $this->_redirect('returnrequest/request/index');
        }
        try {
            $returnRequest = $this->returnRequestRepositoryInterface->getById($returnId);
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Return request not found.'));
            return $this->_redirect('returnrequest/request/index');
        }
        if ($returnRequest->getCustomerId() != $this->customerSession->getCustomerId()) {
            $this->messageManager->addErrorMessage(__('You are not authorized to view this return request.'));
            return $this->_redirect('returnrequest/request/index');
        }
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('Return Request #%1', $returnId));
        return $resultPage;
    }
}
