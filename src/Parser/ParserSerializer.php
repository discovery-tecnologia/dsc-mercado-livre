<?php
/**
 * Class ParserSerializer
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Parser;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;

class ParserSerializer implements SerializerInterface
{
    /**
     * @var \JMS\Serializer\Serializer
     */
    private $serializer;

    public function __construct()
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    /**
     * @param object $object
     * @param string $formatter
     * @param SerializationContext|null $context
     * @return string
     */
    public function serialize($object, $formatter = Formatter::JSON, SerializationContext $context = null)
    {
        return $this->serializer->serialize($object, $formatter, $context);
    }

    /**
     * @param string $data
     * @param string $type
     * @param string $formatter
     * @param DeserializationContext|null $context
     * @return mixed
     */
    public function deserialize($data, $type, $formatter = Formatter::JSON, DeserializationContext $context = null)
    {
        if(substr($data, 0, 1) == '[') {
            return new ArrayCollection($this->serializer->deserialize($data, 'ArrayCollection<' . $type . '>', $formatter, $context));
        }
        return $this->serializer->deserialize($data, $type, $formatter, $context);
    }
} 