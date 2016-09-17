<?php
/**
 * Class CategoryService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Category;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Service;

class CategoryService extends Service
{
    /**
     * @return Collection<Category>
     */
    public function findCategories()
    {
        $meli = $this->getMeli();
        $environment = $meli->getEnvironment();
        $resource = new CategoryResource();
        $resource->setUrl(sprintf('%s/sites/%s/categories', $environment->getWsHost(), $environment->getSite()));

        return $this->get($resource)->handle();
    }

    /**
     * @param string $code
     * @return Category
     */
    public function findCategory($code)
    {
        $resource = new CategoryResource();
        $resource->setUrl(sprintf('%s/categories/%s', $this->getMeli()->getEnvironment()->getWsHost(), $code));

        return $this->get($resource)->handle();
    }

    /**
     * @param string $code
     * @return Collection<Attributes>
     */
    public function findCategoryAttributes($code)
    {
        $resource = new AttributesResource();
        $resource->setUrl(sprintf('%s/categories/%s/attributes', $this->getMeli()->getEnvironment()->getWsHost(), $code));

        return $this->get($resource)->handle();
    }
}