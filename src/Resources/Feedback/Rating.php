<?php

/**
 * Class Rating
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */

namespace Dsc\MercadoLivre\Resources\Feedback;

final class Rating
{
    const NEGATIVE = 'negative';
    const NEUTRAL = 'neutral';
    const POSITIVE = 'positive';

    private static $ratings = [
        self::NEGATIVE => 'negative',
        self::NEUTRAL => 'neutral',
        self::POSITIVE => 'positive'
    ];

    /**
     * @param $value
     * @return bool
     */
    public static function isValid($value)
    {
        return in_array($value, static::$ratings);
    }
}
