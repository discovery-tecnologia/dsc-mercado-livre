<?php
namespace Dsc\MercadoLivre\Category;

use Dsc\MercadoLivre\Service;

class CategoryService extends Service
{
    /**
     * @return \Psr\Http\Message\StreamInterface
     */
    public function findCategories()
    {
        $credential = $this->getCredential();
        $wsResourceCategory = sprintf('%s/sites/%s/categories', $this->getEnvironment()->getWsHost(), $credential->getSiteId());
        return $this->get($wsResourceCategory);
    }

    /**
     * @param string $code
     * @return \Psr\Http\Message\StreamInterface
     */
    public function findCategoryById($code)
    {
        $wsResourceCategory = sprintf('%s/categories/%s', $this->getEnvironment()->getWsHost(), $code);
        $data = $this->get($wsResourceCategory);

        return $this->serializer->deserialize($data->getContents(), Category::class);
    }
}