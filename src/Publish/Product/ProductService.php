<?php
/**
 * Class PublishProductService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Publish\Product;

use Dsc\MercadoLivre\Publish\Service;

class ProductService extends Service
{
    /**
     * @param Product $product
     * @return ProductResponse|mixed
     */
    public function publish(Product $product)
    {
        return new ProductResponseBuilder(
            $this->post('/items', $product)
        );
    }

    /**
     * @param Product $product
     * @return ProductResponse|mixed
     */
    public function update(Product $product)
    {
        return new ProductResponseBuilder(
            $this->put('/items', $product)
        );
    }
}