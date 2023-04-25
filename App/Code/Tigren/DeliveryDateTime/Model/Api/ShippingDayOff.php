<?php
/**
 * @author    Tigren Solutions <info@tigren.com>
 * @copyright Copyright (c) 2023 Tigren Solutions <https://www.tigren.com>. All rights reserved.
 * @license   Open Software License ("OSL") v. 3.0
 */
namespace Tigren\DeliveryDateTime\Model\Api;

use _PHPStan_e0e4f009c\Clue\React\NDJson\Decoder;
use Laminas\Config\Reader\Json;

class ShippingDayOff {
    protected $_scopeConfig;
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    )
    {
        $this->_scopeConfig = $scopeConfig;
    }
    public function getShippingDayOff() {
        $data = $this->_scopeConfig->getValue( 'hello/general/exclude_days',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE );
        $data = json_decode($data, true);
        return $data;
    }
}
