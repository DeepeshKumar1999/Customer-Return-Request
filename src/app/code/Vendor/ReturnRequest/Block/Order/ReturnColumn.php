<?php
namespace Vendor\ReturnRequest\Block\Order;

use Vendor\ReturnRequest\Model\ResourceModel\ReturnRequest\CollectionFactory as ReturnCollectionFactory;
use \Magento\Framework\View\Element\Template;
use \Magento\Sales\Model\Order;

class ReturnColumn extends Template
{
    /**
     * @var Order|null
     */
    protected $order = null;

    /**
     * Dependency Initilization
     *
     * @param Template\Context $context
     * @param ReturnCollectionFactory $collectionFactory
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        protected ReturnCollectionFactory $collectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * Set current order from parent block
     *
     * @param Order $order
     * @return $this
     */
    public function setOrder(Order $order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * Get current order
     *
     * @return Order|null
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Check if return request can be created
     *
     * @return bool
     */
    public function canRequestReturn()
    {
        if (!$this->order) {
            return false;
        }
        if ($this->order->getState() !== Order::STATE_COMPLETE) {
            return false;
        }
        return true;
    }

    /**
     * Is request exist
     *
     * @return bool|int
     */
    public function isRequestExist()
    {
        if (!$this->order) {
            return false;
        }
        if (!$this->order->getId()) {
            return false;
        }
        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('order_id', ['eq' => $this->order->getId()]);

        if (!$collection->getSize()) {
            return false;
        }
        /**
         * @var \Vendor\ReturnRequest\Model\ReturnRequest $lastItem
         */
        $lastItem = $collection->getLastItem();
        return $lastItem->getReturnId();
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
     * Get return request URL
     *
     * @return string
     */
    public function getReturnUrl()
    {
        if (!$this->order) {
            return '#';
        }
        return $this->getUrl(
            'returnrequest/request/create',
            ['order_id' => $this->order->getId()]
        );
    }

    /**
     * Get order increment id (optional helper)
     *
     * @return string|null
     */
    public function getIncrementId()
    {
        return $this->order ? $this->order->getIncrementId() : null;
    }
}
