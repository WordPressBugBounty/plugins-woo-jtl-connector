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
class ProductStockLevel extends DataType
{
    protected function loadProperties()
    {
        return [
            new PropertyInfo('productId', 'Identity', null, false, true, false),
            new PropertyInfo('sku', 'string', '', false, false, false),
            new PropertyInfo('stockLevel', 'double', 0.0, false, false, false),
        ];
    }

    public function isMain()
    {
        return false;
    }
}
