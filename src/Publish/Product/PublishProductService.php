<?php
/**
 * Class ProductService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Publish\Product;

use Dsc\MercadoLivre\Service;

class ProductService extends Service
{
    /**
     * @param Product $product
     * @return ProductResponse
     */
    public function publish(Product $product)
    {
        $accessToken = $this->getAccessToken();
        $builder = new ProductResponseBuilder(
            $this->post('/items', $product, ['access_token' => $accessToken]),
            $this->getSerializer()
        );
        return $builder->getResponse();
    }
}