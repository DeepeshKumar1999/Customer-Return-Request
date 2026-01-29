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
namespace Malvic\ReturnRequest\Api;

/**
 * ReturnRequestRepository Repository Interface
 */
interface ReturnRequestRepositoryInterface
{
    /**
     * Get by id
     *
     * @param int $id
     * @return \Malvic\ReturnRequest\Model\ReturnRequest
     */
    public function getById($id);
    /**
     * Save
     *
     * @param \Malvic\ReturnRequest\Model\ReturnRequest $subject
     * @return \Malvic\ReturnRequest\Model\ReturnRequest
     */
    public function save(\Malvic\ReturnRequest\Model\ReturnRequest $subject);
    /**
     * Get list
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $creteria
     * @return \Malvic\ReturnRequest\Api\Data\ReturnRequestSearchResultInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $creteria);
    /**
     * Delete
     *
     * @param \Malvic\ReturnRequest\Model\ReturnRequest $subject
     * @return boolean
     */
    public function delete(\Malvic\ReturnRequest\Model\ReturnRequest $subject);
    /**
     * Delete by id
     *
     * @param int $id
     * @return boolean
     */
    public function deleteById($id);
}
