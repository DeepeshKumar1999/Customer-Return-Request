<?php
namespace Vendor\ReturnRequest\Api;

/**
 * ReturnStatusHistoryRepository Repository Interface
 */
interface ReturnStatusHistoryRepositoryInterface
{
    /**
     * Get by id
     *
     * @param int $id
     * @return \Vendor\ReturnRequest\Model\ReturnStatusHistory
     */
    public function getById($id);
    /**
     * Save
     *
     * @param \Vendor\ReturnRequest\Model\ReturnStatusHistory $subject
     * @return \Vendor\ReturnRequest\Model\ReturnStatusHistory
     */
    public function save(\Vendor\ReturnRequest\Model\ReturnStatusHistory $subject);
    /**
     * Get list
     *
     * @param Magento\Framework\Api\SearchCriteriaInterface $creteria
     * @return Magento\Framework\Api\SearchResults
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $creteria);
    /**
     * Delete
     *
     * @param \Vendor\ReturnRequest\Model\ReturnStatusHistory $subject
     * @return boolean
     */
    public function delete(\Vendor\ReturnRequest\Model\ReturnStatusHistory $subject);
    /**
     * Delete by id
     *
     * @param int $id
     * @return boolean
     */
    public function deleteById($id);
}

