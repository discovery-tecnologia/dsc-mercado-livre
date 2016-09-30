<?php
/**
 * Class CategoryService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Category;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Service;

class CategoryService extends Service
{
    /**
     * @return Collection
     */
    public function findCategories()
    {
        $meli = $this->getMeli();
        $environment = $meli->getEnvironment();
        $uri = sprintf('/sites/%s/categories', $environment->getSite());
        $response = new CategoryResponseBuilder($this->get($uri));
        return $response->getResponse();
    }

    /**
     * @param string $code
     * @return Category
     */
    public function findCategory($code)
    {
        $uri = sprintf('/categories/%s', $code);
        $response = new CategoryResponseBuilder($this->get($uri));
        return $response->getResponse();
    }

    /**
     * @param string $code
     * @return Collection<Attributes>
     */
    public function findCategoryAttributes($code)
    {
        $uri = sprintf('/categories/%s/attributes', $code);
        $response = new AttributesResponseBuilder($this->get($uri));
        return $response->getResponse();
    }
}