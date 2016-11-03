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
        $credential = $meli ? $meli : new Meli(static::CLIENT_ID, static::CLIENT_SECRET);
        parent::__construct($credential, $client);
    }

    /**
     * @param $site
     * @return Category
     */
    public function findCategories($site)
    {
        return $this->getResponse(
            $this->get('/sites/' . $site . '/categories'),
            Category::class
        );
    }

    /**
     * @param string $code
     * @return Category
     */
    public function findCategory($code)
    {
        return $this->getResponse(
            $this->get('/categories/' . $code),
            Category::class
        );
    }

    /**
     * @param string $code
     * @return Collection
     */
    public function findCategoryAttributes($code)
    {
        return $this->getResponse(
            $this->get('/categories/' . $code . '/attributes'),
            Attributes::class
        );
    }
}