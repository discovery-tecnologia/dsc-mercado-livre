<?php
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Environments\Production;
use Dsc\MercadoLivre\Environments\Test;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
abstract class Environment
{
    /**
     * @var Configuration
     */
    protected $configuration;

    /**
     * Environment constructor.
     * @param Configuration|null $configuration
     */
    public function __construct(Configuration $configuration = null)
    {
        $this->configuration = $configuration ?: new Configuration();
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
     * @param $region
     * @return bool
     */
    public static function isWsAuthValid($region)
    {
        return (array_key_exists($region, Production::$WS_AUTH) && array_key_exists($region, Test::$WS_AUTH));
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
     * @param $region
     * @param $resource
     * @return string
     */
    public function getAuthUrl($region, $resource = null)
    {
        return $this->getWsAuth($region) . $resource;
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
    abstract public function getWsAuth($region);
}