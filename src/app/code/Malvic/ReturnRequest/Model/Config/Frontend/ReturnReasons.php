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
namespace Malvic\ReturnRequest\Model\Config\Frontend;

use \Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
 
class ReturnReasons extends AbstractFieldArray
{
    /**
     * Prepare data to render
     *
     * @return void
     */
    protected function _prepareToRender()
    {
        $this->addColumn(
            'key',
            [
                'label' => __('Reason Key'),
                'class' => 'required-entry validate-alpha no-whitespace'
            ]
        );
        $this->addColumn('value', ['label' => __('Reason Label'), 'class' => 'required-entry']);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add New Option');
    }
}
