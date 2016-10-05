<?php
/**
 * Class Service
 * Utilizado para serviços privados que necessitam de autenticação OAuth2
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Publish;

use Dsc\MercadoLivre\BaseService;
use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\MeliInterface;

class Service extends BaseService
{
    /**
     * Service constructor.
     * @param MeliInterface $meli
     * @param Client|null $client
     */
    public function __construct(MeliInterface $meli, Client $client = null)
    {
        parent::__construct($meli, $client);
    }
}