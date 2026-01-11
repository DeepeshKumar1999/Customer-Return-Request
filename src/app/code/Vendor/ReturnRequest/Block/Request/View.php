<?php
namespace Vendor\ReturnRequest\Block\Request;

use \Magento\Framework\View\Element\Template;
use Vendor\ReturnRequest\Api\ReturnRequestRepositoryInterface;
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
     * @return bool|\Vendor\ReturnRequest\Model\ReturnRequest
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
