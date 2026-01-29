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
namespace Malvic\ReturnRequest\Block\Order;

use \Magento\Framework\View\Element\Template;
use Malvic\ReturnRequest\Model\ResourceModel\ReturnRequest\CollectionFactory as ReturnCollectionFactory;
use \Magento\Customer\Model\Session;
use \Magento\Store\Model\StoreManagerInterface;

class Returns extends Template
{
    /**
     * Dependency Initilization
     *
     * @param Template\Context $context
     * @param ReturnCollectionFactory $collectionFactory
     * @param StoreManagerInterface $storeManager
     * @param Session $customerSession
     * @param array $data
     */
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
     * @return \Malvic\ReturnRequest\Model\ResourceModel\ReturnRequest\Collection
     */
    public function getReturnRequests()
    {
        $customerId = $this->customerSession->getCustomerId();

        return $this->collectionFactory->create()
            ->addFieldToFilter('customer_id', ['eq' => $customerId])
            ->setOrder('created_at', 'DESC');
    }

    /**
     * Get return Order URL
     *
     * @param int $orderId
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
     * @param int $returnId
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

    /**
     * Get Media Url
     *
     * @return string
     */
    public function getMediaUrl(): string
    {
        /**
         * @var \Magento\Store\Model\Store $store
         */
        $store = $this->storeManager->getStore();
        return $store->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
    }
}
