<?php

namespace Vendor\ReturnRequest\Ui\Component\Listing\Columns;

use \Magento\Catalog\Helper\Image;
use \Magento\Framework\UrlInterface;
use \Magento\Framework\View\Element\UiComponentFactory;
use \Magento\Framework\View\Element\UiComponent\ContextInterface;
use \Magento\Store\Model\StoreManagerInterface;
use \Magento\Ui\Component\Listing\Columns\Column;
use \Magento\Catalog\Model\View\Asset\PlaceholderFactory;

class FieldThumbnail extends Column
{
    /**
     * Dependency Initilization
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param PlaceholderFactory $placeholder
     * @param StoreManagerInterface $storeManager
     * @param UrlInterface $urlBuilder
     * @param Image $imageHelper
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        protected PlaceholderFactory $placeholder,
        protected StoreManagerInterface $storeManager,
        protected UrlInterface $urlBuilder,
        protected Image $imageHelper,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     *
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $fieldName = $this->getData('name');
            foreach ($dataSource['data']['items'] as &$item) {
                $url = '';
                if ($item[$fieldName] != '') {
                    /**
                     * @var \Magento\Store\Model\Store
                     */
                    $store = $this->storeManager->getStore();
                    $url = $store->getBaseUrl(
                        UrlInterface::URL_TYPE_MEDIA
                    ) . $item[$fieldName];
                } else {
                    $url = $this->placeholder->create(['type' => 'image'])->getUrl();
                }
                $item[$fieldName . '_src'] = $url;
                $item[$fieldName . '_orig_src'] = $url;
            }
        }
        return $dataSource;
    }
}
