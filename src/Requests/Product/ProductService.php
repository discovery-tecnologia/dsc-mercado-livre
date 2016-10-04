<?php
/**
 * Class ProductService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Product;

use Dsc\MercadoLivre\Requests\Service;

class ProductService extends Service
{
    /**
     * @param $code
     * @return Product
     */
    public function findProduct($code)
    {
        $builder = new ProductResponseBuilder(
            $this->get('/items/' . $code)
        );
        return $builder->getResponse();
    }
}