<?php
/**
 * Class AbstractResource
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Http;

abstract class AbstractMeliResource implements MeliResourceInterface
{
    /**
     * @var string
     */
    protected $path;

    /**
     * @var array
     */
    protected $params = [];

    /**
     * @param string $path
     * @return $this
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function add($key, $value)
    {
        $this->params[$key] = $value;
        return $this;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return string
     */
    public function getTarget()
    {
        return $this->getTargetEntity();
    }

    public abstract function getTargetEntity();
}