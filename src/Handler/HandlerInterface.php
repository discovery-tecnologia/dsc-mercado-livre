<?php
namespace Dsc\MercadoLivre\Handler;

interface HandlerInterface
{
    /**
     * @param callable $handler
     * @return mixed
     */
    public function __invoke(callable $handler);
}