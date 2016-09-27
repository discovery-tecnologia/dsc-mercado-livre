<?php
/**
 * Class ProductResource
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Product;

use Dsc\MercadoLivre\Http\AbstractMeliResource;

class ProductResource extends AbstractMeliResource
{
    /**
     * @return string
     */
    public function getTargetEntity()
    {
        return Product::class;
    }
}