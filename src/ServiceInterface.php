<?php
namespace Dsc\MercadoLivre;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
interface ServiceInterface
{
    /**
     * @param $url
     * @param array $params
     * @return mixed
     */
    public function get($url, array $params);

    /**
     * @param $url
     * @param array $params
     * @return mixed
     */
    public function post($url, array $params);

    /**
     * @param $url
     * @param array $params
     * @return mixed
     */
    public function put($url, array $params);

    /**
     * @param $url
     * @param array $params
     * @return mixed
     */
    public function delete($url, array $params);
}