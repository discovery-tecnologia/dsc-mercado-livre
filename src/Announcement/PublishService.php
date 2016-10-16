<?php
/**
 * Interface PublishService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Announcement;

interface PublishService
{
    /**
     * @param Announcement $announcement
     * @return mixed
     */
    public function create(Announcement $announcement);

    /**
     * @param Announcement $announcement
     * @return mixed
     */
    public function update(Announcement $announcement);
}