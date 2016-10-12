<?php
/**
 * Class PublishProductService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Publish\Product;

use Dsc\MercadoLivre\BaseService;
use Dsc\MercadoLivre\Publish\Model;
use Dsc\MercadoLivre\Publish\PublishService;

class ProductPublisher extends BaseService implements PublishService
{
    /**
     * @param Model $product
     * @return ProductResponse
     */
    public function create(Model $product)
    {
        $builder = new ProductResponseBuilder(
            $this->post('/items', $product)
        );
        return $builder->getResponse();
    }

    /**
     * @param Model $product
     * @return ProductResponse
     */
    public function update(Model $product)
    {
        $builder = new ProductResponseBuilder(
            $this->put('/items', $product)
        );
        return $builder->getResponse();
    }
}