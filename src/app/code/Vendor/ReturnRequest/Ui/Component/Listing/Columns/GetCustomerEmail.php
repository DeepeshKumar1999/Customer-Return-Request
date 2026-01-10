<?php
namespace Vendor\ReturnRequest\Ui\Component\Listing\Columns;

use \Magento\Framework\View\Element\UiComponent\ContextInterface;
use \Magento\Framework\View\Element\UiComponentFactory;
use \Magento\Ui\Component\Listing\Columns\Column;
use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class GetCustomerEmail extends Column
{
    /**
     * Dependency Initilization
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param CustomerRepositoryInterface $customerRepository
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        protected CustomerRepositoryInterface $customerRepository,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
     
    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (!empty($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (empty($item['customer_id'])) {
                    $item[$this->getData('name')] = __('Guest');
                    continue;
                }
                try {
                    $customer = $this->customerRepository->getById((int)$item['customer_id']);
                    $item[$this->getData('name')] = $customer->getEmail();
                } catch (NoSuchEntityException $e) {
                    $item[$this->getData('name')] = __('N/A');
                }
            }
        }
        return $dataSource;
    }
}
