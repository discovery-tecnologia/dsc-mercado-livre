<?php
/**
 * Class ProductService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Product;

use Dsc\MercadoLivre\Service;

class ProductService extends Service
{
    public function save(Product $product)
    {
        $accessToken = $this->getAccessToken();
        $resource = new ProductResource();
        $resource->setPath('/items')
                 ->add('access_token', $accessToken);

        $this->post($resource);
    }
}