<?php
/**
 * Class ProductService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Product;

use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\MeliInterface;
use Dsc\MercadoLivre\Requests\RequestService;
use Dsc\MercadoLivre\BaseService;

class ProductService extends BaseService implements RequestService
{
    /**
     * CategoryService constructor.
     * @param MeliInterface|null $meli
     * @param Client|null $client
     */
    public function __construct(MeliInterface $meli = null, Client $client = null)
    {
        $credential = $meli ? $meli : new Meli(static::CLIENT_ID, static::CLIENT_SECRET);
        parent::__construct($credential, $client);
    }

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
}