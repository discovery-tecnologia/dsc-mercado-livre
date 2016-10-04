<?php
/**
 * Class PublishService
 * Interface utilizada para serviços privados que necessitam de autenticação OAuth2
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Resources;

use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\MeliInterface;

interface PublishService
{
    /**
     * ResourceInterface constructor.
     * @param MeliInterface $meli
     * @param Client|null $client
     */
    public function __construct(MeliInterface $meli, Client $client = null);
}