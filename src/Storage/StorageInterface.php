<?php
namespace Dsc\MercadoLivre\Storage;

interface StorageInterface
{
    /**
     * @param $name
     * @param $value
     * @return mixed
     */
    public function set($name, $value);

    /**
     * @param $name
     * @return mixed
     */
    public function has($name);

    /**
     * @param $name
     * @return mixed
     */
    public function get($name);

    /**
     * @param $name
     * @return mixed
     */
    public function remove($name);
}