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

interface ReturnStatusHistorySearchResultInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get items.
     *
     * @return \Malvic\ReturnRequest\Api\Data\ReturnStatusHistoryInterface[] Array of collection items.
     */
    public function getItems();

    /**
     * Set items.
     *
     * @param \Malvic\ReturnRequest\Api\Data\ReturnStatusHistoryInterface[] $items
     * @return \Malvic\ReturnRequest\Api\Data\ReturnStatusHistorySearchResultInterface
     */
    public function setItems(?array $items = null);
}
