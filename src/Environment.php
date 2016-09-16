<?php
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Environments\Production;
use Dsc\MercadoLivre\Environments\Site;
use Dsc\MercadoLivre\Environments\Test;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
abstract class Environment
{
    /**
     * @var string
     */
    private $site;

    /**
     * @var Configuration
     */
    private $configuration;

    /**
     * Environment constructor.
     * @param string $siteId
     * @param Configuration|null $configuration
     */
    public function __construct($siteId = Site::BRASIL, Configuration $configuration = null)
    {
        $this->site = $siteId;
        $this->configuration = $configuration ?: new Configuration();
    }

    /**
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @return Configuration
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * @param string $host
     *
     * @return boolean
     */
    public static function isWsHostValid($host)
    {
        return in_array($host, [Production::WS_HOST, Test::WS_HOST]);
    }

    /**
     * @param $site
     * @return bool
     */
    public static function isWsAuthValid($site)
    {
        return (array_key_exists($site, Production::$WS_AUTH) && array_key_exists($site, Test::$WS_AUTH));
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
     * @param $resource
     * @return string
     */
    public function getAuthUrl($resource = null)
    {
        return $this->getWsAuth() . $resource;
    }

    /**
     * @return string
     */
    abstract public function getWsHost();

    /**
     * @return string
     */
    abstract public function getOAuthUri();

    /**
     * @param $region
     * @return mixed
     */
    abstract public function getWsAuth();
}