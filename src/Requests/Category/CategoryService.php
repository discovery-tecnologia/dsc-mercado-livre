<?php
/**
 * Class CategoryService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Category;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Meli;
use Dsc\MercadoLivre\MeliInterface;
use Dsc\MercadoLivre\Requests\RequestService;
use Dsc\MercadoLivre\BaseService;

class CategoryService extends BaseService implements RequestService
{
    /**
     * CategoryService constructor.
     * @param MeliInterface|null $meli
     * @param Client|null $client
     */
    public function __construct(MeliInterface $meli = null, Client $client = null)
    {
        $credential = $meli ? $meli : new Meli(self::CLIENT_ID, self::CLIENT_SECRET);
        parent::__construct($credential, $client);
    }

    /**
     * @param $site
     * @return Category
     */
    public function findCategories($site)
    {
        $builder = new CategoryResponseBuilder(
            $this->get(sprintf('/sites/%s/categories', $site))
        );
        return $builder->getResponse();
    }

    /**
     * @param string $code
     * @return Category
     */
    public function findCategory($code)
    {
        $builder = new CategoryResponseBuilder(
            $this->get(sprintf('/categories/%s', $code))
        );
        return $builder->getResponse();
    }

    /**
     * @param string $code
     * @return Collection
     */
    public function findCategoryAttributes($code)
    {
        $builder = new AttributesResponseBuilder(
            $this->get(sprintf('/categories/%s/attributes', $code))
        );
        return $builder->getResponse();
    }
}