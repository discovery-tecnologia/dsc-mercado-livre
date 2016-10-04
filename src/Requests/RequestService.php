<?php
/**
 * Class RequestService
 * Interface utilizada para serviços publicos que não precisam de autenticação OAuth2
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests;

use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\MeliInterface;

interface RequestService
{
    /**
     * ResourceInterface constructor.
     * @param MeliInterface|null $meli
     * @param Client|null $client
     */
    public function __construct(MeliInterface $meli = null, Client $client = null);
}