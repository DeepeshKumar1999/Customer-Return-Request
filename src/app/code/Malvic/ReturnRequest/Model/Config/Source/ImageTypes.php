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
namespace Malvic\ReturnRequest\Model\Config\Source;

use \Magento\Framework\Data\OptionSourceInterface;

class ImageTypes implements OptionSourceInterface
{
    /**
     * To Option Array
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'jpg',  'label' => __('JPG')],
            ['value' => 'jpeg', 'label' => __('JPEG')],
            ['value' => 'png',  'label' => __('PNG')],
            ['value' => 'gif',  'label' => __('GIF')],
            ['value' => 'webp', 'label' => __('WEBP')],
        ];
    }
}
