<?php

/**
 * @author    Jan Weskamp <jan.weskamp@jtl-software.com>
 * @copyright 2010-2013 JTL-Software GmbH
 */

namespace JtlWooCommerceConnector\Controllers\GlobalData;

use jtl\Connector\Model\Currency as CurrencyModel;
use jtl\Connector\Model\Identity;

class Currency
{
    public const ISO                = 'woocommerce_currency';
    public const SIGN_POSITION      = 'woocommerce_currency_pos';
    public const CENT_DELIMITER     = 'woocommerce_price_decimal_sep';
    public const THOUSAND_DELIMITER = 'woocommerce_price_thousand_sep';

    /**
     * @return CurrencyModel
     * @throws \InvalidArgumentException
     */
    public function pullData(): CurrencyModel
    {
        $iso = \get_woocommerce_currency();

        return
            (new CurrencyModel())
                ->setId(new Identity(\strtolower($iso)))
                ->setName($iso)
                ->setDelimiterCent(\get_option(self::THOUSAND_DELIMITER, ''))
                ->setDelimiterThousand(\get_option(self::CENT_DELIMITER, ''))
                ->setIso($iso)
                ->setNameHtml(\get_woocommerce_currency_symbol())
                ->setHasCurrencySignBeforeValue(\get_option(self::SIGN_POSITION, '') === 'left')
                ->setIsDefault(true);
    }

    /**
     * @param array $currencies
     * @return array
     */
    public function pushData(array $currencies): array
    {
        /** @var CurrencyModel $currency */
        foreach ($currencies as $currency) {
            if (!$currency->getIsDefault()) {
                continue;
            }

            \update_option(self::ISO, $currency->getIso(), 'yes');
            \update_option(self::CENT_DELIMITER, $currency->getDelimiterCent(), 'yes');
            \update_option(self::THOUSAND_DELIMITER, $currency->getDelimiterThousand(), 'yes');
            \update_option(
                self::SIGN_POSITION,
                $currency->getHasCurrencySignBeforeValue() ? 'left' : 'right',
                'yes'
            );

            break;
        }

        return $currencies;
    }
}
