<?php
namespace Vendor\ReturnRequest\Api\Data;

interface ReturnStatusHistorySearchResultInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get items.
     *
     * @return \Vendor\ReturnRequest\Api\Data\ReturnStatusHistoryInterface[] Array of collection items.
     */
    public function getItems();

    /**
     * Set items.
     *
     * @param \Vendor\ReturnRequest\Api\Data\ReturnStatusHistoryInterface[] $items
     * @return \Vendor\ReturnRequest\Api\Data\ReturnStatusHistorySearchResultInterface
     */
    public function setItems(?array $items = null);
}
