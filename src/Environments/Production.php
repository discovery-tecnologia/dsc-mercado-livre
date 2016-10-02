<?php
/**
 * Class Production
 * O Mercado Livre até o momento possui apenas estes ambientes, não possui ambiente de testes.
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Environments;

use Dsc\MercadoLivre\Environment;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class Production extends Environment
{
    const WS_HOST   = 'https://api.mercadolibre.com';
    const OAUTH_URI = '/oauth/token';
    // mais informações - GET https://api.mercadolibre.com/sites
    public static $WS_AUTH = [
        Site::ARGENTINA => "https://auth.mercadolibre.com.ar", // Argentina
        Site::BOLIVIA   => "https://auth.mercadolibre.com.bo", // Bolívia
        Site::BRASIL    => "https://auth.mercadolivre.com.br", // Brasil
        Site::COLOMBIA  => "https://auth.mercadolibre.com.co", // Colombia
        Site::COSTA_RICA=> "https://auth.mercadolibre.com.cr", // Costa Rica
        Site::EQUADOR   => "https://auth.mercadolibre.com.ec", // Ecuador
        Site::HONDURAS  => "https://auth.mercadolibre.com.hn", // Honduras
        Site::GUATEMALA => "https://auth.mercadolibre.com.gt", // Guatemala
        Site::CHILE     => "https://auth.mercadolibre.cl",     // Chile
        Site::MEXICO    => "https://auth.mercadolibre.com.mx", // Mexico
        Site::NICARAGUA => "https://auth.mercadolibre.com.ni", // Nicaragua
        Site::PARAGUAI  => "https://auth.mercadolibre.com.py", // Paraguai
        Site::SALVADOR  => "https://auth.mercadolibre.com.sv", // Salvador
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
    public function getWsAuth()
    {
        $site = $this->getSite();
        if(! static::isWsAuthValid($site)) {
            throw new \InvalidArgumentException(sprintf("Region [%s] invalid.", $site));
        }
        return static::$WS_AUTH[$site];
    }
}