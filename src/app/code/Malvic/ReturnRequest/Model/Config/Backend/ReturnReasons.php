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
namespace Malvic\ReturnRequest\Model\Config\Backend;
 
use \Magento\Framework\App\Cache\TypeListInterface;
use \Magento\Framework\App\Config\ScopeConfigInterface;
use \Magento\Framework\App\Config\Value as ConfigValue;
use \Magento\Framework\Data\Collection\AbstractDb;
use \Magento\Framework\Model\Context;
use \Magento\Framework\Model\ResourceModel\AbstractResource;
use \Magento\Framework\Registry;
use Malvic\ReturnRequest\Helper\Data;
 
class ReturnReasons extends ConfigValue
{
    /**
     * Constructor
     *
     * @param Data $helperData
     * @param Context $context
     * @param Registry $registry
     * @param ScopeConfigInterface $config
     * @param TypeListInterface $cacheTypeList
     * @param AbstractResource|null $resource
     * @param AbstractDb|null $resourceCollection
     * @param array $data
     */
    public function __construct(
        protected Data $helperData,
        Context $context,
        Registry $registry,
        ScopeConfigInterface $config,
        TypeListInterface $cacheTypeList,
        ?AbstractResource $resource = null,
        ?AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $config, $cacheTypeList, $resource, $resourceCollection, $data);
    }

    /**
     * Prepare data before save
     *
     * @return \Malvic\ReturnRequest\Model\Config\Backend\ReturnReasons
     */
    public function beforeSave()
    {
        /** @var array $value */
        $value = $this->getValue();
        unset($value['__empty']);
        $encodedValue = $this->helperData->jsonEncode($value);
        $this->setValue($encodedValue);
        return $this;
    }

    /**
     * Process data after load
     *
     * @return \Malvic\ReturnRequest\Model\Config\Backend\ReturnReasons
     */
    protected function _afterLoad()
    {
        /** @var string $value */
        $value = $this->getValue();
        if (!empty($value)) {
            /** @var string $decodedValue */
            $decodedValue = $this->helperData->jsonDecode($value);
            $this->setValue($decodedValue);
        }
        return $this;
    }
}
