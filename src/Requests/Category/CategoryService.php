<?php
/**
 * Class CategoryService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Category;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Requests\RequestService;
use Dsc\MercadoLivre\Requests\Service;

class CategoryService extends Service implements RequestService
{
    /**
     * @param $site
     * @return Category|mixed
     */
    public function findCategories($site)
    {
        return new CategoryResponseBuilder(
            $this->get(sprintf('/sites/%s/categories', $site))
        );
    }

    /**
     * @param string $code
     * @return Category|mixed
     */
    public function findCategory($code)
    {
        return new CategoryResponseBuilder(
            $this->get(sprintf('/categories/%s', $code))
        );
    }

    /**
     * @param string $code
     * @return Collection|mixed
     */
    public function findCategoryAttributes($code)
    {
        return new AttributesResponseBuilder(
            $this->get(sprintf('/categories/%s/attributes', $code))
        );
    }
}