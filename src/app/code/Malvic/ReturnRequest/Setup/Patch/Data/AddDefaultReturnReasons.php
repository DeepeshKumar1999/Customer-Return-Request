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
namespace Malvic\ReturnRequest\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class AddDefaultReturnReasons implements DataPatchInterface
{
    /**
     * @var string
     */
    const CONFIG_PATH = 'returnrequest/general/return_reasons';

    /**
     * Dependency Initilization
     *
     * @param WriterInterface $configWriter
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        protected WriterInterface $configWriter,
        protected ScopeConfigInterface $scopeConfig
    ) {
    }

    /**
     * Apply
     *
     * @return \Malvic\ReturnRequest\Setup\Patch\Data\AddDefaultReturnReasons
     */
    public function apply()
    {
        if ($this->scopeConfig->getValue(self::CONFIG_PATH)) {
            return $this;
        }
        $defaultReasons = [
            'damaged' => [
                'key'   => 'damaged',
                'value' => __('Damaged product')
            ],
            'wrong' => [
                'key'   => 'wrong',
                'value' => __('Wrong item')
            ],
            'quality' => [
                'key'   => 'quality',
                'value' => __('Quality issue')
            ]
        ];
        $this->configWriter->save(
            self::CONFIG_PATH,
            json_encode($defaultReasons)
        );
        return $this;
    }

    /**
     * Get Dependencies
     *
     * @return array
     */
    public static function getDependencies(): array
    {
        return [];
    }

    /**
     * Get Aliases
     *
     * @return array
     */
    public function getAliases(): array
    {
        return [];
    }
}
