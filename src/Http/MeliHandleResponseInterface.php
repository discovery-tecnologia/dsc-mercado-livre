<?php
/**
 * Class MeliHandleResponseInterface
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Http;

interface MeliHandleResponseInterface
{
    /**
     * @return string
     */
    public function response();

    /**
     * @return mixed
     */
    public function handle();

    /**
     * @return string
     */
    public function __toString();

    /**
     * @return string
     */
    public function __invoke();
}