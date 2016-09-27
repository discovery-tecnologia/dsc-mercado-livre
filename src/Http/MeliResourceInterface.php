<?php
/**
 * Class ResourceInterface
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Http;

use Dsc\MercadoLivre\Parser\TargetSerializerInterface;

interface MeliResourceInterface extends TargetSerializerInterface
{
    /**
     * @param string $path
     * @return MeliResourceInterface
     */
    public function setPath($path);

    /**
     * @return string
     */
    public function getPath();

    /**
     * @param $key
     * @param $value
     * @return MeliResourceInterface
     */
    public function add($key, $value);

    /**
     * @return array
     */
    public function getParams();
}