<?php
/**
 * Class ProductService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Publish\Product;

use Dsc\MercadoLivre\BaseService;

class ProductService extends BaseService
{
    /**
     * @param Product $product
     * @return ProductResponse
     */
    public function publish(Product $product)
    {
        $builder = new ProductResponseBuilder(
            $this->post('/items', $product),
            $this->getSerializer()
        );
        return $builder->getResponse();
    }
}