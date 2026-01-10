<?php
namespace Vendor\ReturnRequest\Api\Data;

interface ReturnRequestSearchResultInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get items.
     *
     * @return \Vendor\ReturnRequest\Api\Data\ReturnRequestInterface[] Array of collection items.
     */
    public function getItems();

    /**
     * Set items.
     *
     * @param \Vendor\ReturnRequest\Api\Data\ReturnRequestInterface[] $items
     * @return $this
     */
    public function setItems(?array $items = null);
}
