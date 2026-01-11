<?php
namespace Vendor\ReturnRequest\Api\Data;

/**
 * ReturnStatusHistory Model Interface
 */
interface ReturnStatusHistoryInterface
{
    public const ENTITY_ID = 'entity_id';

    public const RETURN_ID = 'return_id';

    public const OLD_STATUS = 'old_status';

    public const NEW_STATUS = 'new_status';

    public const CHANGED_BY = 'changed_by';

    public const CREATED_AT = 'created_at';

    /**
     * Set EntityId
     *
     * @param int $entityId
     * @return \Vendor\ReturnRequest\Api\Data\ReturnStatusHistoryInterface
     */
    public function setEntityId($entityId);
    /**
     * Get EntityId
     *
     * @return int
     */
    public function getEntityId();
    /**
     * Set ReturnId
     *
     * @param int $returnId
     * @return \Vendor\ReturnRequest\Api\Data\ReturnStatusHistoryInterface
     */
    public function setReturnId($returnId);
    /**
     * Get ReturnId
     *
     * @return int
     */
    public function getReturnId();
    /**
     * Set Old Status
     *
     * @param string $oldStatus
     * @return \Vendor\ReturnRequest\Api\Data\ReturnStatusHistoryInterface
     */
    public function setOldStatus($oldStatus);
    /**
     * Get Old Status
     *
     * @return string
     */
    public function getOldStatus();
    /**
     * Set New Status
     *
     * @param string $newStatus
     * @return \Vendor\ReturnRequest\Api\Data\ReturnStatusHistoryInterface
     */
    public function setNewStatus($newStatus);
    /**
     * Get New Status
     *
     * @return string
     */
    public function getNewStatus();
    /**
     * Set ChangedBy
     *
     * @param string $changedBy
     * @return \Vendor\ReturnRequest\Api\Data\ReturnStatusHistoryInterface
     */
    public function setChangedBy($changedBy);
    /**
     * Get ChangedBy
     *
     * @return string
     */
    public function getChangedBy();
    /**
     * Set CreatedAt
     *
     * @param string $createdAt
     * @return \Vendor\ReturnRequest\Api\Data\ReturnStatusHistoryInterface
     */
    public function setCreatedAt($createdAt);
    /**
     * Get CreatedAt
     *
     * @return string
     */
    public function getCreatedAt();
}

