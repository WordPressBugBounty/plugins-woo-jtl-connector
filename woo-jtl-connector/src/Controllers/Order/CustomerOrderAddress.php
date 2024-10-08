<?php

namespace JtlWooCommerceConnector\Controllers\Order;

use jtl\Connector\Model\DataModel;
use jtl\Connector\Model\Identity;
use JtlWooCommerceConnector\Controllers\BaseController;
use JtlWooCommerceConnector\Utilities\Id;
use JtlWooCommerceConnector\Utilities\Util;

/**
 * Class CustomerOrderAddress
 * @package JtlWooCommerceConnector\Controllers\Order
 */
class CustomerOrderAddress extends BaseController
{
    /**
     * @param string $countryIso
     * @param string $state
     * @return string
     */
    public function getState(string $countryIso, string $state): string
    {
        return Util::getStates()[$countryIso][$state] ?? $state;
    }

    /**
     * @param \WC_Order $order
     * @return Identity
     */
    public function createCustomerId(\WC_Order $order): Identity
    {
        return new Identity(
            $order->get_customer_id() !== 0 ? $order->get_customer_id() : Id::link([Id::GUEST_PREFIX, $order->get_id()])
        );
    }

    protected function createDefaultAddresses(DataModel $address, \WC_Order $order = null): void
    {
        if (empty($address->getCity())) {
            $address->setCity(\get_option('woocommerce_store_city'));
        }

        if (empty($address->getZipCode())) {
            $address->setZipCode(\get_option('woocommerce_store_postcode'));
        }

        if (empty($address->getStreet())) {
            $address->setStreet(\get_option('woocommerce_store_address'));
        }

        if (empty($address->getCountryIso())) {
            $address->setCountryIso(\get_option('woocommerce_default_country'));
        }

        if (empty($address->getLastName())) {
            $address->setLastName('NoLastNameGiven');
        }
    }
}
