<?php
namespace Vendor\ReturnRequest\Model\Source;

use \Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{
    /**
     * To option array
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'new', 'label' => __('New')],
            ['value' => 'approved', 'label' => __('Approved')],
            ['value' => 'rejected', 'label' => __('Rejected')],
        ];
    }
}
