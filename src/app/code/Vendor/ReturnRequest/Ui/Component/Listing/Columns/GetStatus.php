<?php
namespace Vendor\ReturnRequest\Ui\Component\Listing\Columns;

use \Magento\Framework\View\Element\UiComponent\ContextInterface;
use \Magento\Framework\View\Element\UiComponentFactory;
use \Magento\Ui\Component\Listing\Columns\Column;
use \Vendor\ReturnRequest\Helper\Data;

class GetStatus extends Column
{
    /**
     * Dependency Initilization
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param Data $helperData
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        protected Data $helperData,
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
        $returnReasonList = $this->helperData->getReturnReasonStatus();
        if (!empty($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as $key => $items) {
                if (!empty($returnReasonList[$items["status"]])) {
                    $dataSource['data']['items'][$key]['status'] = $returnReasonList[$items["status"]];
                } else {
                    $dataSource['data']['items'][$key]['status'] = __("New");
                }
            }
        }
        return $dataSource;
    }
}
