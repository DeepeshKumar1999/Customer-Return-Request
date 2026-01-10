<?php 
namespace Vendor\ReturnRequest\Model\Config\Frontend;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
 
class ReturnReasons extends AbstractFieldArray
{
    /**
     * Prepare data to render
     *
     * @return void
     */
    protected function _prepareToRender()
    {
        $this->addColumn('key', ['label' => __('Reason Key'), 'class' => 'required-entry validate-alpha no-whitespace']);
        $this->addColumn('value', ['label' => __('Reason Label'), 'class' => 'required-entry']);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add New Option');
    }
}
