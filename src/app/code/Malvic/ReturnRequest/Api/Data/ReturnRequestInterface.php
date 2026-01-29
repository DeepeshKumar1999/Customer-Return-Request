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
namespace Malvic\ReturnRequest\Api\Data;

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
     * @return \Malvic\ReturnRequest\Api\Data\ReturnRequestInterface
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
     * @return \Malvic\ReturnRequest\Api\Data\ReturnRequestInterface
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
     * @return \Malvic\ReturnRequest\Api\Data\ReturnRequestInterface
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
     * @return \Malvic\ReturnRequest\Api\Data\ReturnRequestInterface
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
     * @return \Malvic\ReturnRequest\Api\Data\ReturnRequestInterface
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
     * @return \Malvic\ReturnRequest\Api\Data\ReturnRequestInterface
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
     * @return \Malvic\ReturnRequest\Api\Data\ReturnRequestInterface
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
     * @return \Malvic\ReturnRequest\Api\Data\ReturnRequestInterface
     */
    public function setCreatedAt($createdAt);
    /**
     * Get CreatedAt
     *
     * @return string
     */
    public function getCreatedAt();
}
