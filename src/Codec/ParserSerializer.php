<?php
/**
 * Class ParserSerializer
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Codec;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;

class ParserSerializer implements SerializerInterface
{
    /**
     * @param array $data
     * @param string $formatter
     * @param SerializationContext|null $context
     * @return string
     */
    public function serialize($data, $formatter = Formatter::JSON, SerializationContext $context = null)
    {
        $builder = SerializerBuilder::create()->build();
        return $builder->serialize(\GuzzleHttp\json_decode($data), $formatter, $context);
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
        $builder = SerializerBuilder::create()->build();
        if(isset($data['results'])) {
            return $builder->deserialize($data['results'], 'ArrayCollection<' . $type . '>', $formatter, $context);
        }

        return $builder->deserialize($data, $type, $formatter, $context);
    }
} 