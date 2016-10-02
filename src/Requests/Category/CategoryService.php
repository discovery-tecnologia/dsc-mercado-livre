<?php
/**
 * Class CategoryService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Category;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\BaseService;

class CategoryService extends BaseService
{
    /**
     * @param $site
     * @return mixed
     */
    public function findCategories($site)
    {
        $builder = new CategoryResponseBuilder(
            $this->get(sprintf('/sites/%s/categories', $site)),
            $this->getSerializer()
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
            $this->get(sprintf('/categories/%s', $code)),
            $this->getSerializer()
        );
        return $builder->getResponse();
    }

    /**
     * @param string $code
     * @return Collection<Attributes>
     */
    public function findCategoryAttributes($code)
    {
        $builder = new AttributesResponseBuilder(
            $this->get(sprintf('/categories/%s/attributes', $code)),
            $this->getSerializer()
        );
        return $builder->getResponse();
    }
}