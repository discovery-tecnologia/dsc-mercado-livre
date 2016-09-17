<?php
namespace Dsc\MercadoLivre\Category;

use Dsc\MercadoLivre\Http\MeliResponseInterface;

class AttributesResponse implements MeliResponseInterface
{
    /**
     * @return string
     */
    public function getEntityTarget()
    {
        return Attributes::class;
    }
}