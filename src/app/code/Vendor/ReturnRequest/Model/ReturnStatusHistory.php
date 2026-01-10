<?php
namespace Vendor\ReturnRequest\Model;

/**
 * ReturnStatusHistory Model Class
 */
class ReturnStatusHistory extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface, \Vendor\ReturnRequest\Api\Data\ReturnStatusHistoryInterface
{
    final public const NOROUTE_ENTITY_ID = 'no-route';

    final public const CACHE_TAG = 'vendor_returnrequest_returnstatushistory';

    protected $_cacheTag = 'vendor_returnrequest_returnstatushistory';

    protected $_eventPrefix = 'vendor_returnrequest_returnstatushistory';

    /**
     * Set resource model
     */
    public function _construct()
    {
        $this->_init(\Vendor\ReturnRequest\Model\ResourceModel\ReturnStatusHistory::class);
    }

    /**
     * Load No-Route Indexer.
     *
     * @return $this
     */
    public function noRouteReasons()
    {
        return $this->load(self::NOROUTE_ENTITY_ID, $this->getIdFieldName());
    }

    /**
     * Get identities.
     *
     * @return []
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG.'_'.$this->getId()];
    }

    /**
     * Set EntityId
     *
     * @param int $entityId
     * @return \Vendor\ReturnRequest\Model\ReturnStatusHistoryInterface
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * Get EntityId
     *
     * @return int
     */
    public function getEntityId()
    {
        return parent::getData(self::ENTITY_ID);
    }

    /**
     * Set ReturnId
     *
     * @param int $returnId
     * @return \Vendor\ReturnRequest\Model\ReturnStatusHistoryInterface
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
     * Set Status
     *
     * @param string $status
     * @return \Vendor\ReturnRequest\Model\ReturnStatusHistoryInterface
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
     * Set ChangedAt
     *
     * @param string $changedAt
     * @return \Vendor\ReturnRequest\Model\ReturnStatusHistoryInterface
     */
    public function setChangedAt($changedAt)
    {
        return $this->setData(self::CHANGED_AT, $changedAt);
    }

    /**
     * Get ChangedAt
     *
     * @return string
     */
    public function getChangedAt()
    {
        return parent::getData(self::CHANGED_AT);
    }
}

