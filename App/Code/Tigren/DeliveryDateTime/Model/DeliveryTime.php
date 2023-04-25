<?php

namespace Tigren\DeliveryDateTime\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class DeliveryTime {
    const CONFIG_PATH_DELIVERY_TIME = 'general/delivery_time'; // Configuration path for delivery time

    protected $scopeConfig;

    public function __construct( ScopeConfigInterface $scopeConfig ) {
        $this->scopeConfig = $scopeConfig;
    }

    public function getDeliveryTime() {
        return $this->scopeConfig->getValue( self::CONFIG_PATH_DELIVERY_TIME, ScopeInterface::SCOPE_STORE );
    }

    public function setDeliveryTime( $deliveryTime ) {
        $this->scopeConfig->setValue( self::CONFIG_PATH_DELIVERY_TIME, $deliveryTime, ScopeInterface::SCOPE_STORE );
    }
}
