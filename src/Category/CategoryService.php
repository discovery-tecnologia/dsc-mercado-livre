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
        $wsResourceCategory = sprintf('%s/sites/%s/categories', $environment->getWsHost(), $environment->getSite());
        return $this->get($wsResourceCategory);
    }

    /**
     * @param string $code
     * @return \Psr\Http\Message\StreamInterface
     */
    public function findCategoryById($code)
    {
        $wsResourceCategory = sprintf('%s/categories/%s', $this->getMeli()->getEnvironment()->getWsHost(), $code);
        $data = $this->get($wsResourceCategory);

        return $this->serializer->deserialize($data->getContents(), Category::class);
    }
}