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
namespace Malvic\ReturnRequest\Model;

use \Malvic\ReturnRequest\Api\Data\ReturnStatusHistorySearchResultInterfaceFactory;
use \Malvic\ReturnRequest\Model\ResourceModel\ReturnStatusHistory\CollectionFactory;

/**
 * ReturnStatusHistoryRepository Repo Class
 */
class ReturnStatusHistoryRepository implements \Malvic\ReturnRequest\Api\ReturnStatusHistoryRepositoryInterface
{
    /**
     * Dependency Initilization
     *
     * @param CollectionFactory $collectionFactory
     * @param \Malvic\ReturnRequest\Model\ReturnStatusHistoryFactory $modelFactory
     * @param \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor
     * @param ReturnStatusHistorySearchResultInterfaceFactory $returnStatusHistorySearchResultInterfaceFactory
     */
    public function __construct(
        protected CollectionFactory $collectionFactory,
        protected \Malvic\ReturnRequest\Model\ReturnStatusHistoryFactory $modelFactory,
        protected \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor,
        protected ReturnStatusHistorySearchResultInterfaceFactory $returnStatusHistorySearchResultInterfaceFactory
    ) {
    }

    /**
     * Get by id
     *
     * @param int $id
     * @return \Malvic\ReturnRequest\Model\ReturnStatusHistory
     */
    public function getById($id)
    {
        $model = $this->modelFactory->create()->load($id);
        if (!$model->getId()) {
            throw new \Magento\Framework\Exception\NoSuchEntityException(
                __('The data with the "%1" ID doesn\'t exist.', $id)
            );
        }
        return $model;
    }

    /**
     * Save
     *
     * @param \Malvic\ReturnRequest\Model\ReturnStatusHistory $subject
     * @return \Malvic\ReturnRequest\Model\ReturnStatusHistory
     */
    public function save(\Malvic\ReturnRequest\Model\ReturnStatusHistory $subject)
    {
        try {
            $subject->save();
        } catch (\Exception $exception) {
             throw new \Magento\Framework\Exception\CouldNotSaveException(__($exception->getMessage()));
        }
        return $subject;
    }

    /**
     * Get list
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $creteria
     * @return \Malvic\ReturnRequest\Api\Data\ReturnStatusHistorySearchResultInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $creteria)
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($creteria, $collection);
        $collection->load();
        $searchResult = $this->returnStatusHistorySearchResultInterfaceFactory->create();
        $searchResult->setSearchCriteria($creteria);
        /**
         * @var \Malvic\ReturnRequest\Api\Data\ReturnStatusHistoryInterface[]|null $items
         */
        $items = $collection->getItems();
        $searchResult->setItems($items);
        $searchResult->setTotalCount($collection->getSize());
        return $searchResult;
    }

    /**
     * Delete
     *
     * @param \Malvic\ReturnRequest\Model\ReturnStatusHistory $subject
     * @return boolean
     */
    public function delete(\Malvic\ReturnRequest\Model\ReturnStatusHistory $subject)
    {
        try {
            $subject->delete();
        } catch (\Exception $exception) {
            throw new \Magento\Framework\Exception\CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * Delete by id
     *
     * @param int $id
     * @return boolean
     */
    public function deleteById($id)
    {
        return $this->delete($this->getById($id));
    }
}
