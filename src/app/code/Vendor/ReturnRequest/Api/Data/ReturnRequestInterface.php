<?php
namespace Vendor\ReturnRequest\Api\Data;

/**
 * ReturnRequest Model Interface
 */
interface ReturnRequestInterface
{
    public const RETURN_ID = 'return_id';

    public const ORDER_ID = 'order_id';

    public const CUSTOMER_ID = 'customer_id';

    public const REASON = 'reason';

    public const DESCRIPTION = 'description';

    public const IMAGE = 'image';

    public const STATUS = 'status';

    public const CREATED_AT = 'created_at';

    /**
     * Set ReturnId
     *
     * @param int $returnId
     * @return \Vendor\ReturnRequest\Api\Data\ReturnRequestInterface
     */
    public function setReturnId($returnId);
    /**
     * Get ReturnId
     *
     * @return int
     */
    public function getReturnId();
    /**
     * Set OrderId
     *
     * @param int $orderId
     * @return \Vendor\ReturnRequest\Api\Data\ReturnRequestInterface
     */
    public function setOrderId($orderId);
    /**
     * Get OrderId
     *
     * @return int
     */
    public function getOrderId();
    /**
     * Set CustomerId
     *
     * @param int $customerId
     * @return \Vendor\ReturnRequest\Api\Data\ReturnRequestInterface
     */
    public function setCustomerId($customerId);
    /**
     * Get CustomerId
     *
     * @return int
     */
    public function getCustomerId();
    /**
     * Set Reason
     *
     * @param string $reason
     * @return \Vendor\ReturnRequest\Api\Data\ReturnRequestInterface
     */
    public function setReason($reason);
    /**
     * Get Reason
     *
     * @return string
     */
    public function getReason();
    /**
     * Set Description
     *
     * @param string $description
     * @return \Vendor\ReturnRequest\Api\Data\ReturnRequestInterface
     */
    public function setDescription($description);
    /**
     * Get Description
     *
     * @return string
     */
    public function getDescription();
    /**
     * Set Image
     *
     * @param string $image
     * @return \Vendor\ReturnRequest\Api\Data\ReturnRequestInterface
     */
    public function setImage($image);
    /**
     * Get Image
     *
     * @return string
     */
    public function getImage();
    /**
     * Set Status
     *
     * @param string $status
     * @return \Vendor\ReturnRequest\Api\Data\ReturnRequestInterface
     */
    public function setStatus($status);
    /**
     * Get Status
     *
     * @return string
     */
    public function getStatus();
    /**
     * Set CreatedAt
     *
     * @param string $createdAt
     * @return \Vendor\ReturnRequest\Api\Data\ReturnRequestInterface
     */
    public function setCreatedAt($createdAt);
    /**
     * Get CreatedAt
     *
     * @return string
     */
    public function getCreatedAt();
}
