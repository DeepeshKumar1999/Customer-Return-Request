<?php
namespace Vendor\ReturnRequest\Block\Order;

use Magento\Framework\View\Element\Template;
use Vendor\ReturnRequest\Model\ResourceModel\ReturnRequest\CollectionFactory as ReturnCollectionFactory;
use Magento\Customer\Model\Session;
use Magento\Store\Model\StoreManagerInterface;

class Returns extends Template
{
    public function __construct(
        Template\Context $context,
        protected ReturnCollectionFactory $collectionFactory,
        protected StoreManagerInterface $storeManager,
        protected Session $customerSession,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * Get return requests for current customer
     *
     * @return \Vendor\ReturnRequest\Model\ResourceModel\Request\Collection
     */
    public function getReturnRequests()
    {
        $customerId = $this->customerSession->getCustomerId();

        return $this->collectionFactory->create()
            ->addFieldToFilter('customer_id', $customerId)
            ->setOrder('created_at', 'DESC');
    }

    /**
     * Get return Order URL
     *
     * @return string
     */
    public function getOrderUrl($orderId)
    {
        if (!$orderId) {
            return '#';
        }
        return $this->getUrl(
            'sales/order/view',
            ['order_id' => $orderId]
        );
    }

    /**
     * Get return request URL
     *
     * @return string
     */
    public function getReturnRequestUrl($returnId)
    {
        if (!$returnId) {
            return '#';
        }
        return $this->getUrl(
            'returnrequest/request/view',
            ['return_id' => $returnId]
        );
    }

    public function getMediaUrl(): string
    {
        return $this->storeManager
            ->getStore()
            ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
    }
}
