<?php
/**
 * Class Test
 * Este Environment foi criado, mas o Mercado Livre até o momento não possui ambiente de sandbox ou teste, apenas produção
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Environments;

use Dsc\MercadoLivre\Environment;

class Test extends Environment
{
    const WS_HOST   = 'https://api.mercadolibre.com';
    const OAUTH_URI = '/oauth/token';
    // mais informações - GET https://api.mercadolibre.com/sites
    public static $WS_AUTH = [
        Site::ARGENTINA => "https://auth.mercadolibre.com.ar",
        Site::BOLIVIA   => "https://auth.mercadolibre.com.bo",
        Site::BRASIL    => "https://auth.mercadolivre.com.br",
        Site::COLOMBIA  => "https://auth.mercadolibre.com.co",
        Site::COSTA_RICA=> "https://auth.mercadolibre.com.cr",
        Site::EQUADOR   => "https://auth.mercadolibre.com.ec",
        Site::HONDURAS  => "https://auth.mercadolibre.com.hn",
        Site::GUATEMALA => "https://auth.mercadolibre.com.gt",
        Site::CHILE     => "https://auth.mercadolibre.cl",
        Site::MEXICO    => "https://auth.mercadolibre.com.mx",
        Site::NICARAGUA => "https://auth.mercadolibre.com.ni",
        Site::PARAGUAI  => "https://auth.mercadolibre.com.py",
        Site::SALVADOR  => "https://auth.mercadolibre.com.sv",
        Site::URUGUAI   => "https://auth.mercadolibre.com.uy",
        Site::VENEZUELA => "https://auth.mercadolibre.com.ve",
        Site::PANAMA    => "https://auth.mercadolibre.com.pa",
        Site::PERU      => "https://auth.mercadolibre.com.pe",
        Site::PORTUGAL  => "https://auth.mercadolibre.com.pt",
        Site::DOMINICANA=> "https://auth.mercadolibre.com.do"
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