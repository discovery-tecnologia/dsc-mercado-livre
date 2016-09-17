<?php
/**
 * Class CategoryService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Category;

use Dsc\MercadoLivre\Service;

class CategoryService extends Service
{
    /**
     * @return \Psr\Http\Message\StreamInterface
     */
    public function findCategories()
    {
        $meli = $this->getMeli();
        $environment = $meli->getEnvironment();
        $resource = new CategoryResource();
        $resource->setUrl(sprintf('%s/sites/%s/categories', $environment->getWsHost(), $environment->getSite()));

        return $this->get($resource);
    }

    /**
     * @param string $code
     * @return \Psr\Http\Message\StreamInterface
     */
    public function findCategoryById($code)
    {
        $resource = new CategoryResource();
        $resource->setUrl(sprintf('%s/categories/%s', $this->getMeli()->getEnvironment()->getWsHost(), $code));
        $data = $this->get($resource);

        return $this->serializer->deserialize($data->getContents(), Category::class);
    }
}