<?php
/**
 * Class PublishProductService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Publish\Product;

use Dsc\MercadoLivre\Publish\PublishService;
use Dsc\MercadoLivre\Publish\Service;

class ProductService extends Service implements PublishService
{
    /**
     * @param Product $product
     * @return ProductResponse
     */
    public function publish(Product $product)
    {
        $builder = new ProductResponseBuilder(
            $this->post('/items', $product)
        );
        return $builder->getResponse();
    }

    /**
     * @param Product $product
     * @return ProductResponse
     */
    public function update(Product $product)
    {
        $builder = new ProductResponseBuilder(
            $this->put('/items', $product)
        );
        return $builder->getResponse();
    }
}