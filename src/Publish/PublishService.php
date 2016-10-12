<?php
/**
 * Class PublishService
 * Interface utilizada para serviços privados que necessitam de autenticação OAuth2
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Publish;

interface PublishService
{
    /**
     * @param Model $model
     * @return mixed
     */
    public function create(Model $model);

    /**
     * @param Model $model
     * @return mixed
     */
    public function update(Model $model);
}