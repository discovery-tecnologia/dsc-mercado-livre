<?php
namespace Dsc\MercadoLivre\Category;

use Dsc\MercadoLivre\Client;
use Dsc\MercadoLivre\Codec\ParserSerializer;
use Dsc\MercadoLivre\Codec\SerializerInterface;
use Dsc\MercadoLivre\Credentials;
use Dsc\MercadoLivre\Service;

class CategoryService extends Service
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @param Credentials $credentials
     * @param Client $client
     * @param SerializerInterface $serializer
     */
    public function __construct(
        Credentials $credentials,
        Client $client = null,
        SerializerInterface $serializer = null
    ) {
        parent::__construct($credentials, $client);
        $this->serializer = $serializer ?: new ParserSerializer();
    }

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
//var_dump($data->getContents());die;
        return $this->serializer->deserialize($data->getContents(), Category::class);
    }
}