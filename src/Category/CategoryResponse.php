<?php
namespace Dsc\MercadoLivre\Category;

use Dsc\MercadoLivre\Http\MeliResponseInterface;

class CategoryResponse implements MeliResponseInterface
{
    /**
     * @return mixed
     */
    public function getEntityTarget()
    {
        return Category::class;
    }
}