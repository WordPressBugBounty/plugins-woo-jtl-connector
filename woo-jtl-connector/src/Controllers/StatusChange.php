<?php

/**
 * @author    Jan Weskamp <jan.weskamp@jtl-software.com>
 * @copyright 2010-2013 JTL-Software GmbH
 */

namespace JtlWooCommerceConnector\Controllers;

use jtl\Connector\Model\CustomerOrder;
use jtl\Connector\Model\StatusChange as StatusChangeModel;

class StatusChange extends BaseController
{
    /**
     * @param StatusChangeModel $statusChange
     * @return StatusChangeModel
     * @throws \WC_Data_Exception
     */
    public function pushData(StatusChangeModel $statusChange): StatusChangeModel
    {
        $order = \wc_get_order($statusChange->getCustomerOrderId()->getEndpoint());

        if ($order instanceof \WC_Order) {
            if ($statusChange->getOrderStatus() === CustomerOrder::STATUS_CANCELLED) {
                \add_filter('woocommerce_can_restore_order_stock', function ($true, $order) {
                    return false;
                }, 10, 2);
            }

            $newStatus = $this->mapStatus($statusChange, $order);
            if ($newStatus !== null) {
                if ($newStatus === 'wc-completed') {
                    $this->linkIfPaymentIsNotLinked($statusChange);
                }

                $order->set_status($newStatus);
                $order->save();
            }
        }

        return $statusChange;
    }

    /**
     * @param StatusChangeModel $statusChange
     * @return void
     */
    protected function linkIfPaymentIsNotLinked(StatusChangeModel $statusChange): void
    {
        global $wpdb;
        $jclp        = $wpdb->prefix . 'jtl_connector_link_payment';
        $endpointId  = $statusChange->getCustomerOrderId()->getEndpoint();
        $paymentLink = $this->database->queryOne(\sprintf(
            'SELECT * FROM %s WHERE `endpoint_id` = %s',
            $jclp,
            $endpointId
        ));
        if (empty($paymentLink)) {
            $this->database->query(\sprintf(
                'INSERT INTO %s (`endpoint_id`, `host_id`) VALUES (%s,%s)',
                $jclp,
                $endpointId,
                0
            ));
        }
    }

    /**
     * @param StatusChangeModel $statusChange
     * @param \WC_Order $wcOrder
     * @return string|null
     */
    private function mapStatus(StatusChangeModel $statusChange, \WC_Order $wcOrder): ?string
    {
        if ($statusChange->getOrderStatus() === CustomerOrder::STATUS_CANCELLED) {
            return 'wc-cancelled';
        } elseif ($statusChange->getOrderStatus() === CustomerOrder::STATUS_NEW) {
            if ($statusChange->getPaymentStatus() === CustomerOrder::PAYMENT_STATUS_COMPLETED) {
                return 'wc-processing';
            }

            return 'wc-pending';
        } elseif ($statusChange->getOrderStatus() === CustomerOrder::STATUS_SHIPPED) {
            if ($statusChange->getPaymentStatus() === CustomerOrder::PAYMENT_STATUS_COMPLETED) {
                return 'wc-completed';
            }

            if ($wcOrder->has_downloadable_item() === false) {
                return 'wc-processing';
            }

            return 'wc-on-hold';
        } elseif ($statusChange->getOrderStatus() === CustomerOrder::STATUS_PARTIALLY_SHIPPED) {
            return 'wc-processing';
        }

        return null;
    }
}
