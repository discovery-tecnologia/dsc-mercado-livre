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
     */
    public function publish(Product $product)
    {
        $accessToken = $this->getAccessToken();
        $resource = new ProductResource();
        $resource->setPath('/items')
                 ->add('access_token', $accessToken);

        $this->post($resource);
    }
}