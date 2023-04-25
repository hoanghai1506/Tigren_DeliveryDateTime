<?php

namespace Tigren\DeliveryDateTime\Block\Adminhtml;
use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;
use Tigren\DeliveryDateTime\Block\Adminhtml\Form\Field\CustomColumn2;
class DynamicFieldData extends AbstractFieldArray{
    private $dropdownRenderer;
    protected function _prepareToRender() {
        $this->addColumn(
            'attribute_name',
            [
                'label' => __('Attribute Name'),
                'class' => 'required-entry',
            ]
        );
        $this->addColumn(
            'dropdown_field',
            [
                'label' => __('Dropdown'),
                'renderer' => $this->getDropdownRenderer(),
            ]
        );
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }
    protected function _prepareArrayRow(DataObject $row) {
        $options = [];
        $dropdownField = $row->getDropdownField();
        if ($dropdownField !== null) {
            $options['option_' . $this->getDropdownRenderer()->calcOptionHash($dropdownField)] = 'selected="selected"';
        }
        $row->setData('option_extra_attrs', $options);
    }
    private function getDropdownRenderer() {
        if (!$this->dropdownRenderer) {
            $this->dropdownRenderer = $this->getLayout()->createBlock(
                CustomColumn2::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->dropdownRenderer;
    }
}
