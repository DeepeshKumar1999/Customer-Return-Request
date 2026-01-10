<?php
namespace Vendor\ReturnRequest\Api\Data;

/**
 * ReturnStatusHistory Model Interface
 */
interface ReturnStatusHistoryInterface
{
    public const ENTITY_ID = 'entity_id';

    public const RETURN_ID = 'return_id';

    public const STATUS = 'status';

    public const CHANGED_AT = 'changed_at';

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
     * Set Status
     *
     * @param string $status
     * @return \Vendor\ReturnRequest\Api\Data\ReturnStatusHistoryInterface
     */
    public function setStatus($status);
    /**
     * Get Status
     *
     * @return string
     */
    public function getStatus();
    /**
     * Set ChangedAt
     *
     * @param string $changedAt
     * @return \Vendor\ReturnRequest\Api\Data\ReturnStatusHistoryInterface
     */
    public function setChangedAt($changedAt);
    /**
     * Get ChangedAt
     *
     * @return string
     */
    public function getChangedAt();
}

