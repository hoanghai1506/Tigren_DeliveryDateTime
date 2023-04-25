<?php

namespace Tigren\DeliveryDateTime\Block\Adminhtml\Form\Field;
use Magento\Framework\View\Element\Html\Select;
class CustomColumn2 extends Select {
    public function setInputName($value)
    {
        return $this->setName($value);
    }
    public function setInputId($value)
    {
        return $this->setId($value);
    }
    public function _toHtml()
    {
        if (!$this->getOptions()) {
            $this->setOptions($this->getHour());
            $this->setOptions($this->getMinute());
        }

        // Tạo dropdown cho giờ
        $hourSelect = $this->_getSelect()->setName('hour')->setId('hour')->setClass('hour-select');
        foreach ($this->getHour() as $option) {
            $hourSelect->addOption($option['value'], $option['label']);
        }
        $html = $hourSelect->getHtml();

        // Tạo dropdown cho phút
        $minuteSelect = $this->_getSelect()->setName('minute')->setId('minute')->setClass('minute-select');
        foreach ($this->getMinute() as $option) {
            $minuteSelect->addOption($option['value'], $option['label']);
        }
//        $html .= $minuteSelect->getHtml();
        return parent::_toHtml().$html;
    }
    protected function _getSelect()
    {
        return $this->getLayout()->createBlock(
            Select::class,
            '',
            ['data' => ['is_render_to_js_template' => true]]
        );
    }
    private function getSourceOptions()
    {
        return [
            ['label' => 'Yes', 'value' => '1'],
            ['label' => 'No', 'value' => '0'],
        ];
    }
    private function getHour()
    {
        return [
            ['label' => '0', 'value' => '0'],
            ['label' => '1', 'value' => '1'],
            ['label' => '2', 'value' => '2'],
            ['label' => '3', 'value' => '3'],
            ['label' => '4', 'value' => '4'],
            ['label' => '5', 'value' => '5'],
            ['label' => '6', 'value' => '6'],
            ['label' => '7', 'value' => '7'],
            ['label' => '8', 'value' => '8'],
            ['label' => '9', 'value' => '9'],
            ['label' => '10', 'value' => '10'],
            ['label' => '11', 'value' => '11'],
            ['label' => '12', 'value' => '12'],
            ['label' => '13', 'value' => '13'],
            ['label' => '14', 'value' => '14'],
            ['label' => '15', 'value' => '15'],
            ['label' => '16', 'value' => '16'],
            ['label' => '17', 'value' => '17'],
            ['label' => '18', 'value' => '18'],
            ['label' => '19', 'value' => '19'],
            ['label' => '20', 'value' => '20'],
            ['label' => '21', 'value' => '21'],
            ['label' => '22', 'value' => '22'],
            ['label' => '23', 'value' => '23'],

        ] ;
    }
    private function getMinute()
    {
        return [
            ['label' => '00', 'value' => '00'],
            ['label' => '15', 'value' => '15'],
            ['label' => '30', 'value' => '30'],
            ['label' => '45', 'value' => '45'],
        ];
    }
}
