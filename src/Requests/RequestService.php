<?php
/**
 * Interface RequestService
 * Interface utilizada para serviços publicos que não precisam de autenticação OAuth2
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests;

interface RequestService
{
    /**
     * ANONYMOUS USER
     * @var string
     */
    const CLIENT_ID     = 'ANONYMOUS_CLIENT';

    /**
     * ANONYMOUS SECRET
     * @var string
     */
    const CLIENT_SECRET = 'ANONYMOUS_SECRET';
}