<?php
namespace Dsc\MercadoLivre\Environments;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class Site
{
    const ARGENTINA  = 'MLA';
    const BOLIVIA    = 'MBO';
    const BRASIL     = 'MLB';
    const COLOMBIA   = 'MCO';
    const COSTA_RICA = 'MCR';
    const EQUADOR    = 'MEC';
    const HONDURAS   = 'MHN';
    const GUATEMALA  = 'MGT';
    const CHILE      = 'MLC';
    const MEXICO     = 'MLM';
    const NICARAGUA  = 'MNI';
    const PARAGUAI   = 'MPY';
    const SALVADOR   = 'MSV';
    const URUGUAI    = 'MLU';
    const VENEZUELA  = 'MLV';
    const PANAMA     = 'MPA';
    const PERU       = 'MPE';
    const PORTUGAL   = 'MPT';
    const DOMINICANA = 'MRD';

    private static $sites = [
        self::ARGENTINA  => 'MLA',
        self::BOLIVIA    => 'MBO',
        self::BRASIL     => 'MLB',
        self::COLOMBIA   => 'MCO',
        self::COSTA_RICA => 'MCR',
        self::EQUADOR    => 'MEC',
        self::HONDURAS   => 'MHN',
        self::GUATEMALA  => 'MGT',
        self::CHILE      => 'MLC',
        self::MEXICO     => 'MLM',
        self::NICARAGUA  => 'MNI',
        self::PARAGUAI   => 'MPY',
        self::SALVADOR   => 'MSV',
        self::URUGUAI    => 'MLU',
        self::VENEZUELA  => 'MLV',
        self::PANAMA     => 'MPA',
        self::PERU       => 'MPE',
        self::PORTUGAL   => 'MPT',
        self::DOMINICANA => 'MRD'
    ];

    /**
     * @param $value
     * @return bool
     */
    public static function isValid($value)
    {
        return in_array($value, static::$sites);
    }
}