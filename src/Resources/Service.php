<?php
/**
 * Class Service
 * Utilizado para serviços privados que necessitam de autenticação OAuth2
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources;

use Dsc\MercadoLivre\BaseService;
use Dsc\MercadoLivre\MeliInterface;

class Service extends BaseService
{
    /**
     * Service constructor.
     * @param MeliInterface $meli
     * @param null $client
     */
    public function __construct(MeliInterface $meli, $client = null)
    {
        parent::__construct($meli, $client);
    }
}