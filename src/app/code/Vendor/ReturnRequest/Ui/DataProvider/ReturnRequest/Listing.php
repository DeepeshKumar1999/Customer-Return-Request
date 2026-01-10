<?php
namespace Vendor\ReturnRequest\Ui\DataProvider\ReturnRequest;

use Vendor\ReturnRequest\Model\ResourceModel\ReturnRequest\CollectionFactory;

class Listing extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var Vendor\ReturnRequest\Model\ResourceModel\ReturnRequest\Collection
     */
    protected $collection;

    /**
     * @var array
     */
    protected $_loadedData;

    /**
     * Data Provider
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $collectionFactory
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }
}
