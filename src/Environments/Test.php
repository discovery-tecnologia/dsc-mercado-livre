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
        Site::ARGENTINA => "https://auth.mercadolibre.com.ar", // Argentina
        Site::BRASIL    => "https://auth.mercadolivre.com.br", // Brasil
        Site::COLOMBIA  => "https://auth.mercadolibre.com.co", // Colombia
        Site::COSTA_RICA=> "https://auth.mercadolibre.com.cr", // Costa Rica
        Site::EQUADOR   => "https://auth.mercadolibre.com.ec", // Ecuador
        Site::CHILE     => "https://auth.mercadolibre.cl",     // Chile
        Site::MEXICO    => "https://auth.mercadolibre.com.mx", // Mexico
        Site::URUGUAI   => "https://auth.mercadolibre.com.uy", // Uruguay
        Site::VENEZUELA => "https://auth.mercadolibre.com.ve", // Venezuela
        Site::PANAMA    => "https://auth.mercadolibre.com.pa", // Panama
        Site::PERU      => "https://auth.mercadolibre.com.pe", // Peru
        Site::PORTUGAL  => "https://auth.mercadolibre.com.pt", // Portugal
        Site::DOMINICANA=> "https://auth.mercadolibre.com.do"  // Dominicana
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
    public function getOAuthUri()
    {
        return static::OAUTH_URI;
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