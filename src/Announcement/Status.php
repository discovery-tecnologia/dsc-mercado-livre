<?php
/**
 * Class Status
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Announcement;

final class Status
{
    /**
     * @var string
     */
    const CLOSED = 'closed';

    /**
     * @var string
     */
    const PAUSED = 'paused';

    /**
     * @var string
     */
    const ACTIVE = 'active';

    private static $status = [
        self::CLOSED,
        self::PAUSED,
        self::ACTIVE
    ];

    /**
     * @param $value
     * @return bool
     */
    public static function isValid($value)
    {
        return in_array($value, static::$status);
    }
}