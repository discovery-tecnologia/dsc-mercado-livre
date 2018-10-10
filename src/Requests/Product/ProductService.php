<?php
/**
 * Class ProductService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Product;

use Dsc\MercadoLivre\Requests\Service;
use Dsc\MercadoLivre\Requests\Product\Variation;
use Doctrine\Common\Collections\Collection;

class ProductService extends Service
{
    /**
     * @param $code
     * @return Product
     */
    public function findProduct($code)
    {
        return $this->getResponse(
            $this->get('/items/' . $code),
            Product::class
        );
    }

    /**
     * @param string $code
     * @return Collection
     * @link https://developers.mercadolibre.com/pt_br/variacoes#Consultar-varia%C3%A7%C3%B5es
     */
    public function findVariations($code)
    {
        return $this->getResponse(
            $this->get("/items/$code/variations"),
            Variation::class
        );
    }

    /**
     * @param string $code - codigo do Produto Mercado Livre
     * @param integer $id - ID da Variacao
     * @return Variation
     * @link https://developers.mercadolibre.com/pt_br/variacoes#Consultar-varia%C3%A7%C3%B5es
     */
    public function getVariation($code, $id)
    {
        return $this->getResponse(
            $this->get("/items/$code/variations/$id"),
            Variation::class
        );
    }
}