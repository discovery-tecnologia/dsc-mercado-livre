<?php
/**
 * Interface AnnouncementManager
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Announcement;

interface AnnouncementManager
{
    /**
     * @param Announcement $announcement
     * @return mixed
     */
    public function create(Announcement $announcement);

    /**
     * @param string $code
     * @param array $data
     * @return mixed
     */
    public function update($code, $data);

    /**
     * @param string $code
     * @return mixed
     */
    public function delete($code);

    /**
     * @param string $code
     * @param string $status
     * @return mixed
     */
    public function changeStatus($code, $status);
}