<?php
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Environments\Production;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
abstract class Environment
{
    /**
     * @param string $host
     *
     * @return boolean
     */
    public static function isValid($host)
    {
        return in_array($host, [Production::WS_HOST]);
    }

    /**
     * @param string $host
     *
     * @return boolean
     */
    public static function isValidAuth($host)
    {
        return in_array($host, [Production::WS_HOST]);
    }

    /**
     * @param string $resource
     *
     * @return string
     */
    public function getWsUrl($resource)
    {
        return $this->getWsHost() . $resource;
    }

    /**
     * @param string $resource
     *
     * @return string
     */
    public function getAuthUrl($resource)
    {
        return $this->getWsAuth() . $resource;
    }

    /**
     * @return string
     */
    abstract public function getWsHost();

    /**
     * @param $region
     * @return mixed
     */
    abstract public function getWsAuth($region);
}