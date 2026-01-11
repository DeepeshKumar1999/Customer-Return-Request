<?php
namespace Vendor\ReturnRequest\Api;

/**
 * ReturnRequestRepository Repository Interface
 */
interface ReturnRequestRepositoryInterface
{
    /**
     * Get by id
     *
     * @param int $id
     * @return \Vendor\ReturnRequest\Model\ReturnRequest
     */
    public function getById($id);
    /**
     * Save
     *
     * @param \Vendor\ReturnRequest\Model\ReturnRequest $subject
     * @return \Vendor\ReturnRequest\Model\ReturnRequest
     */
    public function save(\Vendor\ReturnRequest\Model\ReturnRequest $subject);
    /**
     * Get list
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $creteria
     * @return \Vendor\ReturnRequest\Api\Data\ReturnRequestSearchResultInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $creteria);
    /**
     * Delete
     *
     * @param \Vendor\ReturnRequest\Model\ReturnRequest $subject
     * @return boolean
     */
    public function delete(\Vendor\ReturnRequest\Model\ReturnRequest $subject);
    /**
     * Delete by id
     *
     * @param int $id
     * @return boolean
     */
    public function deleteById($id);
}
