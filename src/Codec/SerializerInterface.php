<?php
/**
 * Interface Serializer
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Codec;

use JMS\Serializer\DeserializationContext;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface as JMSSerializerInterface;

interface SerializerInterface extends JMSSerializerInterface
{
    /**
     * @param array $data
     * @param string $format
     * @param SerializationContext|null $context
     * @return mixed
     */
    public function serialize($data, $format = Formatter::JSON, SerializationContext $context = null);

    /**
     * @param string $data
     * @param string $type
     * @param string $format
     * @param DeserializationContext|null $context
     * @return mixed
     */
    public function deserialize($data, $type, $format = Formatter::JSON, DeserializationContext $context = null);
} 