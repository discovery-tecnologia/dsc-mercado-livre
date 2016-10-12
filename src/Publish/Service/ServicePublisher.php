<?php
/**
 * Class ServicePublisher
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Publish\Service;

use Dsc\MercadoLivre\BaseService;
use Dsc\MercadoLivre\Publish\Model;
use Dsc\MercadoLivre\Publish\PublishService;

class ServicePublisher extends BaseService implements PublishService
{
    /**
     * @param Model $service
     * @return mixed
     */
    public function create(Model $service)
    {
        // TODO Implementar
    }

    /**
     * @param Model $service
     * @return mixed
     */
    public function update(Model $service)
    {
        // TODO Implementar
    }
}