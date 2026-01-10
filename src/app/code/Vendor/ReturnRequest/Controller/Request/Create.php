<?php
namespace Vendor\ReturnRequest\Controller\Request;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Customer\Model\Session;
use Magento\Sales\Api\OrderRepositoryInterface;

class Create extends Action
{
    public function __construct(
        Context $context,
        protected Session $customerSession,
        protected PageFactory $resultPageFactory,
        protected OrderRepositoryInterface $orderRepository
    ) {
        parent::__construct($context);
    }

    public function execute()
    {
        if (!$this->customerSession->isLoggedIn()) {
            return $this->_redirect('customer/account/login');
        }
        $orderId = (int)$this->getRequest()->getParam('order_id');
        if (!$orderId) {
            $this->messageManager->addErrorMessage(__('Invalid order.'));
            return $this->_redirect('sales/order/history');
        }
        try {
            $order = $this->orderRepository->get($orderId);
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Order not found.'));
            return $this->_redirect('sales/order/history');
        }
        if ($order->getCustomerId() != $this->customerSession->getCustomerId()) {
            $this->messageManager->addErrorMessage(__('You are not allowed to request return for this order.'));
            return $this->_redirect('sales/order/history');
        }
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('Request Return'));
        return $resultPage;
    }
}
