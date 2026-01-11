<?php
namespace Vendor\ReturnRequest\Model;

use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;
use \Vendor\ReturnRequest\Api\Data\ReturnRequestInterface;

/**
 * ReturnRequest Model Class
 */
class ReturnRequest extends AbstractModel implements IdentityInterface, ReturnRequestInterface
{
    public const NOROUTE_ENTITY_ID = 'no-route';

    public const CACHE_TAG = 'vendor_returnrequest_returnrequest';

    /**
     * @var string
     */
    protected $_cacheTag = 'vendor_returnrequest_returnrequest';

    /**
     * @var string
     */
    protected $_eventPrefix = 'vendor_returnrequest_returnrequest';

    /**
     * Set resource model
     */
    public function _construct()
    {
        $this->_init(\Vendor\ReturnRequest\Model\ResourceModel\ReturnRequest::class);
    }

    /**
     * Load No-Route Indexer.
     *
     * @return \Vendor\ReturnRequest\Model\ReturnRequest
     */
    public function noRouteReasons()
    {
        /**
         * @var int $noRoute
         */
        $noRoute = self::NOROUTE_ENTITY_ID;
        return $this->load($noRoute, $this->getIdFieldName());
    }

    /**
     * Get identities.
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG.'_'.$this->getId()];
    }

    /**
     * Set ReturnId
     *
     * @param int $returnId
     * @return \Vendor\ReturnRequest\Model\ReturnRequest
     */
    public function setReturnId($returnId)
    {
        return $this->setData(self::RETURN_ID, $returnId);
    }

    /**
     * Get ReturnId
     *
     * @return int
     */
    public function getReturnId()
    {
        return parent::getData(self::RETURN_ID);
    }

    /**
     * Set OrderId
     *
     * @param int $orderId
     * @return \Vendor\ReturnRequest\Model\ReturnRequest
     */
    public function setOrderId($orderId)
    {
        return $this->setData(self::ORDER_ID, $orderId);
    }

    /**
     * Get OrderId
     *
     * @return int
     */
    public function getOrderId()
    {
        return parent::getData(self::ORDER_ID);
    }

    /**
     * Set CustomerId
     *
     * @param int $customerId
     * @return \Vendor\ReturnRequest\Model\ReturnRequest
     */
    public function setCustomerId($customerId)
    {
        return $this->setData(self::CUSTOMER_ID, $customerId);
    }

    /**
     * Get CustomerId
     *
     * @return int
     */
    public function getCustomerId()
    {
        return parent::getData(self::CUSTOMER_ID);
    }

    /**
     * Set Reason
     *
     * @param string $reason
     * @return \Vendor\ReturnRequest\Model\ReturnRequest
     */
    public function setReason($reason)
    {
        return $this->setData(self::REASON, $reason);
    }

    /**
     * Get Reason
     *
     * @return string
     */
    public function getReason()
    {
        return parent::getData(self::REASON);
    }

    /**
     * Set Description
     *
     * @param string $description
     * @return \Vendor\ReturnRequest\Model\ReturnRequest
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * Get Description
     *
     * @return string
     */
    public function getDescription()
    {
        return parent::getData(self::DESCRIPTION);
    }

    /**
     * Set Image
     *
     * @param string $image
     * @return \Vendor\ReturnRequest\Model\ReturnRequest
     */
    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }

    /**
     * Get Image
     *
     * @return string
     */
    public function getImage()
    {
        return parent::getData(self::IMAGE);
    }

    /**
     * Set Status
     *
     * @param string $status
     * @return \Vendor\ReturnRequest\Model\ReturnRequest
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }

    /**
     * Get Status
     *
     * @return string
     */
    public function getStatus()
    {
        return parent::getData(self::STATUS);
    }

    /**
     * Set CreatedAt
     *
     * @param string $createdAt
     * @return \Vendor\ReturnRequest\Model\ReturnRequest
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Get CreatedAt
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return parent::getData(self::CREATED_AT);
    }

    /**
     * After Save
     *
     * @return \Vendor\ReturnRequest\Model\ReturnRequest
     */
    protected function _afterSave()
    {
        parent::_afterSave();
        if ($this->isObjectNew()) {
            $this->_eventManager->dispatch(
                'vendor_returnrequest_new',
                ['return_request' => $this]
            );
        }
        return $this;
    }
}
