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
namespace Malvic\ReturnRequest\Model;

use \Magento\Framework\Model\AbstractModel;
use \Magento\Framework\DataObject\IdentityInterface;
use \Malvic\ReturnRequest\Api\Data\ReturnStatusHistoryInterface;

/**
 * ReturnStatusHistory Model Class
 */
class ReturnStatusHistory extends AbstractModel implements IdentityInterface, ReturnStatusHistoryInterface
{
    public const NOROUTE_ENTITY_ID = 'no-route';

    public const CACHE_TAG = 'malvic_returnrequest_returnstatushistory';

    /**
     * @var string
     */
    protected $_cacheTag = 'malvic_returnrequest_returnstatushistory';

    /**
     * @var string
     */
    protected $_eventPrefix = 'malvic_returnrequest_returnstatushistory';

    /**
     * Set resource model
     */
    public function _construct()
    {
        $this->_init(\Malvic\ReturnRequest\Model\ResourceModel\ReturnStatusHistory::class);
    }

    /**
     * Load No-Route Indexer.
     *
     * @return \Malvic\ReturnRequest\Model\ReturnStatusHistory
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
     * Set EntityId
     *
     * @param int $entityId
     * @return \Malvic\ReturnRequest\Model\ReturnStatusHistory
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
     * @return \Malvic\ReturnRequest\Model\ReturnStatusHistory
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
     * Set Old Status
     *
     * @param string $oldStatus
     * @return \Malvic\ReturnRequest\Model\ReturnStatusHistory
     */
    public function setOldStatus($oldStatus)
    {
        return $this->setData(self::OLD_STATUS, $oldStatus);
    }

    /**
     * Get Old Status
     *
     * @return string
     */
    public function getOldStatus()
    {
        return parent::getData(self::OLD_STATUS);
    }

    /**
     * Set New Status
     *
     * @param string $newStatus
     * @return \Malvic\ReturnRequest\Model\ReturnStatusHistory
     */
    public function setNewStatus($newStatus)
    {
        return $this->setData(self::NEW_STATUS, $newStatus);
    }

    /**
     * Get New Status
     *
     * @return string
     */
    public function getNewStatus()
    {
        return parent::getData(self::NEW_STATUS);
    }

    /**
     * Set ChangedBy
     *
     * @param string $changedBy
     * @return \Malvic\ReturnRequest\Model\ReturnStatusHistory
     */
    public function setChangedBy($changedBy)
    {
        return $this->setData(self::CHANGED_BY, $changedBy);
    }

    /**
     * Get ChangedBy
     *
     * @return string
     */
    public function getChangedBy()
    {
        return parent::getData(self::CHANGED_BY);
    }

    /**
     * Set CreatedAt
     *
     * @param string $createdAt
     * @return \Malvic\ReturnRequest\Model\ReturnStatusHistory
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
}
