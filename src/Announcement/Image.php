<?php
/**
 * Interface Image
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Announcement;

interface Image
{
    /**
     * @return string
     */
    public function getSource();

    /**
     * @param string $source
     */
    public function setSource($source);
}