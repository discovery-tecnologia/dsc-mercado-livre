<?php
/**
 * Class ProductService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Product;

use Dsc\MercadoLivre\BaseService;

class ProductService extends BaseService
{
    /**
     * @param $code
     * @return Product
     */
    public function findProduct($code)
    {
        $builder = new ProductResponseBuilder(
            $this->get('/items/' . $code),
            $this->getSerializer()
        );
        return $builder->getResponse();
    }
}