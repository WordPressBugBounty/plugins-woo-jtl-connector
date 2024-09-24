<?php declare(strict_types=1);
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Core\Utilities
 */

namespace jtl\Connector\Core\Utilities;

use \jtl\Connector\Core\Exception\LanguageException;

class Language
{
    /** @var string */
    public const CACHE_KEY_CONVERT = 'c';
    /** @var string  */
    public const CACHE_KEY_MAP = 'm';

    /** @var array<mixed>  */
    protected static $cache = [];

    /** @var array<string, string> */
    protected static $languages = [
        'ab' => 'abk', 'aa' => 'aar', 'af' => 'afr',
        'ak' => 'aka', 'sq' => 'alb', 'am' => 'amh',
        'ar' => 'ara', 'an' => 'arg', 'hy' => 'arm',
        'as' => 'asm', 'av' => 'ava', 'ae' => 'ave',
        'ay' => 'aym', 'az' => 'aze', 'bm' => 'bam',
        'ba' => 'bak', 'eu' => 'baq', 'be' => 'bel',
        'bn' => 'ben', 'bh' => 'bih', 'bi' => 'bis',
        'bs' => 'bos', 'br' => 'bre', 'bg' => 'bul',
        'my' => 'bur', 'ca' => 'cat', 'ch' => 'cha',
        'ce' => 'che', 'ny' => 'nya', 'zh' => 'chi',
        'cv' => 'chv', 'kw' => 'cor', 'co' => 'cos',
        'cr' => 'cre', 'hr' => 'hrv', 'cs' => 'cze',
        'da' => 'dan', 'dv' => 'div', 'nl' => 'dut',
        'dz' => 'dzo', 'en' => 'eng', 'eo' => 'epo',
        'et' => 'est', 'ee' => 'ewe', 'fo' => 'fao',
        'fj' => 'fij', 'fi' => 'fin', 'fr' => 'fre',
        'ff' => 'ful', 'gl' => 'glg', 'ka' => 'geo',
        'de' => 'ger', 'el' => 'gre', 'gn' => 'grn',
        'gu' => 'guj', 'ht' => 'hat', 'ha' => 'hau',
        'he' => 'heb', 'hz' => 'her', 'hi' => 'hin',
        'ho' => 'hmo', 'hu' => 'hun', 'ia' => 'ina',
        'id' => 'ind', 'ie' => 'ile', 'ga' => 'gle',
        'ig' => 'ibo', 'ik' => 'ipk', 'io' => 'ido',
        'is' => 'ice', 'it' => 'ita', 'iu' => 'iku',
        'ja' => 'jpn', 'jv' => 'jav', 'kl' => 'kal',
        'kn' => 'kan', 'kr' => 'kau', 'ks' => 'kas',
        'kk' => 'kaz', 'km' => 'khm', 'ki' => 'kik',
        'rw' => 'kin', 'ky' => 'kir', 'kv' => 'kom',
        'kg' => 'kon', 'ko' => 'kor', 'ku' => 'kur',
        'kj' => 'kua', 'la' => 'lat', 'lb' => 'ltz',
        'lg' => 'lug', 'li' => 'lim', 'ln' => 'lin',
        'lo' => 'lao', 'lt' => 'lit', 'lu' => 'lub',
        'lv' => 'lav', 'gv' => 'glv', 'mk' => 'mac',
        'mg' => 'mlg', 'ms' => 'may', 'ml' => 'mal',
        'mt' => 'mlt', 'mi' => 'mao', 'mr' => 'mar',
        'mh' => 'mah', 'mn' => 'mon', 'na' => 'nau',
        'nv' => 'nav', 'nb' => 'nob', 'nd' => 'nde',
        'ne' => 'nep', 'ng' => 'ndo', 'nn' => 'nno',
        'no' => 'nor', 'ii' => 'iii', 'nr' => 'nbl',
        'oc' => 'oci', 'oj' => 'oji', 'cu' => 'chu',
        'om' => 'orm', 'or' => 'ori', 'os' => 'oss',
        'pa' => 'pan', 'pi' => 'pli', 'fa' => 'per',
        'pl' => 'pol', 'ps' => 'pus', 'pt' => 'por',
        'qu' => 'que', 'rm' => 'roh', 'rn' => 'run',
        'ro' => 'rum', 'ru' => 'rus', 'sa' => 'san',
        'sc' => 'srd', 'sd' => 'snd', 'se' => 'sme',
        'sm' => 'smo', 'sg' => 'sag', 'sr' => 'srp',
        'gd' => 'gla', 'sn' => 'sna', 'si' => 'sin',
        'sk' => 'slo', 'sl' => 'slv', 'so' => 'som',
        'st' => 'sot', 'es' => 'spa', 'su' => 'sun',
        'sw' => 'swa', 'ss' => 'ssw', 'sv' => 'swe',
        'ta' => 'tam', 'te' => 'tel', 'tg' => 'tgk',
        'th' => 'tha', 'ti' => 'tir', 'bo' => 'tib',
        'tk' => 'tuk', 'tl' => 'tgl', 'tn' => 'tsn',
        'to' => 'ton', 'tr' => 'tur', 'ts' => 'tso',
        'tt' => 'tat', 'tw' => 'twi', 'ty' => 'tah',
        'ug' => 'uig', 'uk' => 'ukr', 'ur' => 'urd',
        'uz' => 'uzb', 've' => 'ven', 'vi' => 'vie',
        'vo' => 'vol', 'wa' => 'wln', 'cy' => 'wel',
        'wo' => 'wol', 'fy' => 'fry', 'xh' => 'xho',
        'yi' => 'yid', 'yo' => 'yor', 'za' => 'zha',
        'zu' => 'zul'
    ];

    /**
     * @param string|null $short
     * @param string|null $long
     *
     * @return string|null
     * @throws LanguageException
     */
    public static function convert(?string $short = null, ?string $long = null): ?string
    {
        if (\is_null($short) && \is_null($long)) {
            throw new LanguageException('Short and Long cannot be null');
        }

        if (!empty($short) && isset(self::$languages[$short])) {
            return self::$languages[$short];
        }

        if (!empty($long)) {
            $long = \strtolower($long);

            if (($shortSearch = \array_search($long, self::$languages)) !== false && \is_string($shortSearch)) {
                return $shortSearch;
            }
        }

        return null;
    }

    /**
     * @param string|null $locale
     * @param string|null $country
     * @param string|null $lang
     * @param bool        $useLong
     *
     * @return string|null
     * @throws LanguageException|\InvalidArgumentException
     */
    public static function map(
        ?string $locale  = null,
        ?string $country = null,
        ?string $lang    = null,
        bool    $useLong = true
    ): ?string
    {
        if (\is_null($locale) && \is_null($country) && \is_null($lang)) {
            throw new LanguageException('Locale, Country and Language cannot be null');
        }
        if (!empty($locale)) {
            $locale = self::getLocaleString($locale);
            return $useLong ? self::convert($locale) : $locale;
        }

        if (!\is_null($lang)) {
            $country = self::convert(null, $lang);
        }

        if (!empty($country)) {
            return self::getLocaleString(\strtolower($country));
        }

        return null;
    }

    /**
     * cuts of everything after '_'. ex: de_AT -> de
     * @param string $localeStr
     *
     * @return string
     * @throws \InvalidArgumentException
     */
    private static function getLocaleString(string $localeStr): string
    {
        if(\strpos($localeStr, '_') !== false) {
            $localeStr = \substr($localeStr, 0, \strpos($localeStr, '_'));
        }

        if ($localeStr === false) {
            throw new \InvalidArgumentException('locale string must have the format: \'xx_xx\'');
        }

        return $localeStr;
    }
}
