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
use Dsc\MercadoLivre\BaseService;

class CategoryService extends BaseService implements RequestService
{
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