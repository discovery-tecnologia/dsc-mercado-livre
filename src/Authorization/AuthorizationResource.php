<?php
/**
 * Class AuthorizationResource
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Authorization;

use Dsc\MercadoLivre\Http\ResourceInterface;

class AuthorizationResource implements ResourceInterface
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var array
     */
    protected $params;

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
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
}