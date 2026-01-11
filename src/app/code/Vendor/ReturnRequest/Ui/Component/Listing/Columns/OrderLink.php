<?php
namespace Vendor\ReturnRequest\Ui\Component\Listing\Columns;

use \Magento\Framework\UrlInterface;
use \Magento\Ui\Component\Listing\Columns\Column;

class OrderLink extends Column
{
    /**
     * Dependency Initilization
     *
     * @param \Magento\Framework\View\Element\UiComponent\ContextInterface $context
     * @param \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        protected UrlInterface $urlBuilder,
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
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                if (!empty($item['order_id'])) {
                    $orderId = (int) $item['order_id'];

                    $item[$this->getData('name')] = sprintf(
                        '<a href="%s" target="_blank">%s</a>',
                        $this->urlBuilder->getUrl(
                            'sales/order/view',
                            ['order_id' => $orderId]
                        ),
                        $orderId
                    );
                }
            }
        }
        return $dataSource;
    }
}
