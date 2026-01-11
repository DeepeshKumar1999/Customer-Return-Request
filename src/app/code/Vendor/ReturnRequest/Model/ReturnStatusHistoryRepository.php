<?php
namespace Vendor\ReturnRequest\Model;

use \Vendor\ReturnRequest\Api\Data\ReturnStatusHistorySearchResultInterfaceFactory;
use \Vendor\ReturnRequest\Model\ResourceModel\ReturnStatusHistory\CollectionFactory;

/**
 * ReturnStatusHistoryRepository Repo Class
 */
class ReturnStatusHistoryRepository implements \Vendor\ReturnRequest\Api\ReturnStatusHistoryRepositoryInterface
{
    /**
     * Dependency Initilization
     *
     * @param CollectionFactory $collectionFactory
     * @param \Vendor\ReturnRequest\Model\ReturnStatusHistoryFactory $modelFactory
     * @param \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor
     * @param ReturnStatusHistorySearchResultInterfaceFactory $returnStatusHistorySearchResultInterfaceFactory
     */
    public function __construct(
        protected CollectionFactory $collectionFactory,
        protected \Vendor\ReturnRequest\Model\ReturnStatusHistoryFactory $modelFactory,
        protected \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor,
        protected ReturnStatusHistorySearchResultInterfaceFactory $returnStatusHistorySearchResultInterfaceFactory
    ) {
    }

    /**
     * Get by id
     *
     * @param int $id
     * @return \Vendor\ReturnRequest\Model\ReturnStatusHistory
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
     * @param \Vendor\ReturnRequest\Model\ReturnStatusHistory $subject
     * @return \Vendor\ReturnRequest\Model\ReturnStatusHistory
     */
    public function save(\Vendor\ReturnRequest\Model\ReturnStatusHistory $subject)
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
     * @return \Vendor\ReturnRequest\Api\Data\ReturnStatusHistorySearchResultInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $creteria)
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($creteria, $collection);
        $collection->load();
        $searchResult = $this->returnStatusHistorySearchResultInterfaceFactory->create();
        $searchResult->setSearchCriteria($creteria);
        /**
         * @var \Vendor\ReturnRequest\Api\Data\ReturnStatusHistoryInterface[]|null $items
         */
        $items = $collection->getItems();
        $searchResult->setItems($items);
        $searchResult->setTotalCount($collection->getSize());
        return $searchResult;
    }

    /**
     * Delete
     *
     * @param \Vendor\ReturnRequest\Model\ReturnStatusHistory $subject
     * @return boolean
     */
    public function delete(\Vendor\ReturnRequest\Model\ReturnStatusHistory $subject)
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
