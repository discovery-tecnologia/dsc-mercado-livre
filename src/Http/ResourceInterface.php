<?php
/**
 * Class ResourceInterface
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Http;

interface ResourceInterface
{
    /**
     * @param string $url
     * @return ResourceInterface
     */
    public function setUrl($url);

    /**
     * @return string
     */
    public function getUrl();

    /**
     * @param $key
     * @param $value
     * @return ResourceInterface
     */
    public function add($key, $value);

    /**
     * @return array
     */
    public function getParams();
}