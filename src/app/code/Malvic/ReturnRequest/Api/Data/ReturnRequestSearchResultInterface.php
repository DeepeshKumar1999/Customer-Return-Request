<?php
/**
 * Malvic Software Private Limited
 *
 * @author    Malvic Software Private Limited
 * @copyright Malvic Software Private Limited
 * @license   Malvic Software Private Limited
 */
namespace Malvic\ReturnRequest\Api\Data;

interface ReturnRequestSearchResultInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get items.
     *
     * @return \Malvic\ReturnRequest\Api\Data\ReturnRequestInterface[] Array of collection items.
     */
    public function getItems();

    /**
     * Set items.
     *
     * @param \Malvic\ReturnRequest\Api\Data\ReturnRequestInterface[] $items
     * @return \Malvic\ReturnRequest\Api\Data\ReturnRequestSearchResultInterface
     */
    public function setItems(?array $items = null);
}
