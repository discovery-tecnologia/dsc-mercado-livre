<?php
/**
 * Class CategoryResource
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Category;

use Dsc\MercadoLivre\Http\AbstractMeliResource;

class AttributesResource extends AbstractMeliResource
{
    /**
     * @return string
     */
    public function getTargetEntity()
    {
        return Attributes::class;
    }
}