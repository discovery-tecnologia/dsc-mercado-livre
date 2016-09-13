<?php
namespace Dsc\MercadoLivre\Http;

interface RequestInterface
{
    /**
     * @return string
     */
    public function getUrl();

    /**
     * @return array
     */
    public function getParams();
}