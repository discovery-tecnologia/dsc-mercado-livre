<?php
namespace Dsc\MercadoLivre\Environments;

use Dsc\MercadoLivre\Environment;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class Test extends Environment
{
    const WS_HOST   = 'https://api.mercadolibre.com';
    //const WS_AUTH   = 'http://auth.mercadolivre.com.br/authorization';
    const OAUTH_URI = '/oauth/token';
    public static $WS_AUTH = [
        "MLA" => "https://auth.mercadolibre.com.ar", // Argentina
        "MLB" => "https://auth.mercadolivre.com.br", // Brasil
        "MCO" => "https://auth.mercadolibre.com.co", // Colombia
        "MCR" => "https://auth.mercadolibre.com.cr", // Costa Rica
        "MEC" => "https://auth.mercadolibre.com.ec", // Ecuador
        "MLC" => "https://auth.mercadolibre.cl",     // Chile
        "MLM" => "https://auth.mercadolibre.com.mx", // Mexico
        "MLU" => "https://auth.mercadolibre.com.uy", // Uruguay
        "MLV" => "https://auth.mercadolibre.com.ve", // Venezuela
        "MPA" => "https://auth.mercadolibre.com.pa", // Panama
        "MPE" => "https://auth.mercadolibre.com.pe", // Peru
        "MPT" => "https://auth.mercadolibre.com.pt", // Portugal
        "MRD" => "https://auth.mercadolibre.com.do"  // Dominicana
    ];

    /**
     * {@inheritdoc}
     */
    public function getWsHost()
    {
        return static::WS_HOST;
    }

    /**
     * {@inheritdoc}
     */
    public function getWsAuth($region)
    {
        if(! static::isWsAuthValid($region)) {
            throw new \InvalidArgumentException(sprintf("Region [%s] invalid.", $region));
        }
        return static::$WS_AUTH[$region];
    }
}