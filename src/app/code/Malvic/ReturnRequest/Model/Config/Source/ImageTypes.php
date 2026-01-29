<?php
/**
 * Malvic Software Private Limited
 *
 * @author    Malvic Software Private Limited
 * @copyright Malvic Software Private Limited
 * @license   Malvic Software Private Limited
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
