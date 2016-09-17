<?php
/**
 * Class ResourceInterface
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Http;

interface MeliResourceInterface
{
    /**
     * @param string $url
     * @return MeliResourceInterface
     */
    public function setUrl($url);

    /**
     * @return string
     */
    public function getUrl();

    /**
     * @param $key
     * @param $value
     * @return MeliResourceInterface
     */
    public function add($key, $value);

    /**
     * @return array
     */
    public function getParams();
}