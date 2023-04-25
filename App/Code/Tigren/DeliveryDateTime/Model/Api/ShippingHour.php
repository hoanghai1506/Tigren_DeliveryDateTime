<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */
namespace Tigren\DeliveryDateTime\Model\Api;

class ShippingHour  {
    protected $_scopeConfig;
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    )
    {
        $this->_scopeConfig = $scopeConfig;
    }
    public function getShippingHours(){
        $data = $this->_scopeConfig->getValue('hello/delivery_time_group/TimeSelect',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $data = json_decode($data, true);
        return $data;
    }
}
