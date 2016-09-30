<?php
/**
 * Class ProductService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Product;

use Dsc\MercadoLivre\Service;

class ProductService extends Service
{
    /**
     * @param $code
     */
    public function findProduct($code)
    {
        $response = new ProductResponseBuilder(
            $this->get('/items/' . $code),
            $this->getSerializer()
        );
        return $response->getResponse();
    }
}