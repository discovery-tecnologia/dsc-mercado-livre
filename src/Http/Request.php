<?php
namespace Dsc\MercadoLivre\Http;

abstract class Request
{
    /**
     * @var string
     */
    private $url;

    /**
     * Request constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        $params = [];

        $reflection = new \ReflectionClass(get_called_class());
        $properties = $reflection->getProperties();
        foreach($properties as $val) {

            $val->setAccessible(true);
            $value = $val->getValue($this);
            if(!$value) {
                continue;
            }

            $newKey = preg_replace('/[A-Z]/', '_$0', $val->name);
            $newKey = strtolower($newKey);
            $newKey = ltrim($newKey, '_');

            $params[$newKey] = $value;

        }

        return $params;
    }
}