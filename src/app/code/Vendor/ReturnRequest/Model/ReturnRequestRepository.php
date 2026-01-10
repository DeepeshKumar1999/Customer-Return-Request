<?php
namespace Vendor\ReturnRequest\Model;

use \Vendor\ReturnRequest\Api\Data\ReturnRequestSearchResultInterfaceFactory;
use \Vendor\ReturnRequest\Model\ResourceModel\ReturnRequest\CollectionFactory;

/**
 * ReturnRequestRepository Repo Class
 */
class ReturnRequestRepository implements \Vendor\ReturnRequest\Api\ReturnRequestRepositoryInterface
{
    /**
     * Dependency Initilization
     *
     * @param CollectionFactory $collectionFactory
     * @param \Vendor\ReturnRequest\Model\ReturnRequestFactory $modelFactory
     * @param \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor
     * @param ReturnRequestSearchResultInterfaceFactory $returnRequestSearchResultFactory
     */
    public function __construct(
        protected CollectionFactory $collectionFactory,
        protected \Vendor\ReturnRequest\Model\ReturnRequestFactory $modelFactory,
        protected \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor,
        protected ReturnRequestSearchResultInterfaceFactory $returnRequestSearchResultFactory
    ) {
    }

    /**
     * Get by id
     *
     * @param int $id
     * @return \Vendor\ReturnRequest\Model\ReturnRequest
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
     * @param \Vendor\ReturnRequest\Model\ReturnRequest $subject
     * @return \Vendor\ReturnRequest\Model\ReturnRequest
     */
    public function save(\Vendor\ReturnRequest\Model\ReturnRequest $subject)
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
     * @param Magento\Framework\Api\SearchCriteriaInterface $creteria
     * @return Magento\Framework\Api\SearchResults
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $creteria)
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessor->process($creteria, $collection);
        $collection->load();
        $searchResult = $this->returnRequestSearchResultFactory->create();
        $searchResult->setSearchCriteria($creteria);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());
        return $searchResult;
    }

    /**
     * Delete
     *
     * @param \Vendor\ReturnRequest\Model\ReturnRequest $subject
     * @return boolean
     */
    public function delete(\Vendor\ReturnRequest\Model\ReturnRequest $subject)
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

