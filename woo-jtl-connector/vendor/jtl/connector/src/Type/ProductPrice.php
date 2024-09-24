<?php
/**
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Type
 */

namespace jtl\Connector\Type;

use jtl\Connector\Type\PropertyInfo;

/**
 * @access public
 * @package jtl\Connector\Type
 */
class ProductPrice extends DataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('customerGroupId', 'Identity', null, false, true, false),
            new PropertyInfo('customerId', 'Identity', null, false, true, false),
            new PropertyInfo('id', 'Identity', null, true, true, false),
            new PropertyInfo('productId', 'Identity', null, false, true, false),
            new PropertyInfo('sku', 'string', '', false, false, false),
            new PropertyInfo('vat', 'double', null, false, false, false),
            new PropertyInfo('taxClassId', 'Identity', null, false, true, false),
            new PropertyInfo('items', '\jtl\Connector\Model\ProductPriceItem', null, false, false, true),
        ];
    }

    public function isMain()
    {
        return false;
    }
}
