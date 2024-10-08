<?php

/**
 * @copyright 2010-2019 JTL-Software GmbH
 * @package Jtl\Connector\Core\Application
 */

namespace JtlWooCommerceConnector\Controllers;

use Exception;
use JtlWooCommerceConnector\Utilities\SupportedPlugins;
use WC_Advanced_Shipment_Tracking_Actions;
use AST_Pro_Actions;

class DeliveryNote extends BaseController
{
    /**
     * @param \jtl\Connector\Model\DeliveryNote $deliveryNote
     * @return \jtl\Connector\Model\DeliveryNote
     * @throws Exception
     */
    protected function pushData(\jtl\Connector\Model\DeliveryNote $deliveryNote): \jtl\Connector\Model\DeliveryNote
    {
        if (
            SupportedPlugins::isActive(SupportedPlugins::PLUGIN_ADVANCED_SHIPMENT_TRACKING_FOR_WOOCOMMERCE)
            || SupportedPlugins::isActive(SupportedPlugins::PLUGIN_ADVANCED_SHIPMENT_TRACKING_PRO)
        ) {
            $orderId = $deliveryNote->getCustomerOrderId()->getEndpoint();

            $order = \wc_get_order($orderId);

            if (!$order instanceof \WC_Order) {
                return $deliveryNote;
            }

            $shipmentTrackingActions = $this->getShipmentTrackingActions();

            foreach ($deliveryNote->getTrackingLists() as $trackingList) {
                $trackingInfoItem                 = [];
                $trackingInfoItem['date_shipped'] = $deliveryNote->getCreationDate()->format("Y-m-d");

                $trackingProviders = $shipmentTrackingActions->get_providers();

                $shippingProviderName = \trim($trackingList->getName());

                $providerSlug = $this->findTrackingProviderSlug(
                    $shippingProviderName,
                    \is_array($trackingProviders)
                    ? $trackingProviders
                    : []
                );
                if ($providerSlug !== null) {
                    $trackingInfoItem['tracking_provider'] = $providerSlug;
                } else {
                    $trackingInfoItem['custom_tracking_provider'] = $shippingProviderName;
                }

                foreach ($trackingList->getCodes() as $trackingCode) {
                    $trackingInfoItem['tracking_number'] = $trackingCode;
                    $shipmentTrackingActions->add_tracking_item($order->get_id(), $trackingInfoItem);
                }
            }
        }

        return $deliveryNote;
    }

    /**
     * @return object|WC_Advanced_Shipment_Tracking_Actions|null
     */
    protected function getShipmentTrackingActions()
    {
        $shipmentTrackingActions = null;
        if (SupportedPlugins::isActive(SupportedPlugins::PLUGIN_ADVANCED_SHIPMENT_TRACKING_FOR_WOOCOMMERCE)) {
            $shipmentTrackingActions = WC_Advanced_Shipment_Tracking_Actions::get_instance();
        } else {
            if (SupportedPlugins::isActive(SupportedPlugins::PLUGIN_ADVANCED_SHIPMENT_TRACKING_PRO)) {
                $shipmentTrackingActions = AST_Pro_Actions::get_instance();
            }
        }
        return $shipmentTrackingActions;
    }

    /**
     * @param string $shippingMethodName
     * @param array $trackingProviders
     * @return string|null
     */
    private function findTrackingProviderSlug(string $shippingMethodName, array $trackingProviders): ?string
    {
        $searchResultSlug         = null;
        $searchResultLength       = 0;
        $sameSearchResultQuantity = 0;

        foreach ($trackingProviders as $trackingProviderSlug => $trackingProvider) {
            $providerName       = $trackingProvider['provider_name'];
            $providerNameLength = \strlen($providerName);

            $shippingMethodNameStartsWithProviderName
                = \substr($shippingMethodName, 0, $providerNameLength) === $providerName;
            $newResultIsMoreSimilarThanPrevious       = $providerNameLength > $searchResultLength;
            $newResultHasSameLengthAsPrevious         = $providerNameLength === $searchResultLength;

            if ($shippingMethodNameStartsWithProviderName) {
                if ($newResultIsMoreSimilarThanPrevious) {
                    $searchResultSlug         = (string)$trackingProviderSlug;
                    $searchResultLength       = $providerNameLength;
                    $sameSearchResultQuantity = 0;
                } elseif ($newResultHasSameLengthAsPrevious) {
                    $searchResultSlug = null;
                    $sameSearchResultQuantity++;
                }
            }
        }

        return $sameSearchResultQuantity > 1 ? null : $searchResultSlug;
    }
}
