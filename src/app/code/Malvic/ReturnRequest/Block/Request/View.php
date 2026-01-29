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
use Malvic\ReturnRequest\Api\ReturnRequestRepositoryInterface;
use \Magento\Store\Model\StoreManagerInterface;

class View extends Template
{
    /**
     * Dependency Initilization
     *
     * @param Template\Context $context
     * @param ReturnRequestRepositoryInterface $returnRequestRepositoryInterface
     * @param StoreManagerInterface $storeManager
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        protected ReturnRequestRepositoryInterface $returnRequestRepositoryInterface,
        protected StoreManagerInterface $storeManager,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * Get Return Request
     *
     * @return bool|\Malvic\ReturnRequest\Model\ReturnRequest
     */
    public function getReturnRequest()
    {
        $returnId = (int)$this->getRequest()->getParam('return_id');
        try {
            return $this->returnRequestRepositoryInterface->getById($returnId);
        } catch (\Exception $e) {
            $returnId = 0;
        }
        return false;
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
}
