<?php
/**
 * Class Announcement
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Announcement\Announcement as AnnouncementInterface;
use Dsc\MercadoLivre\Announcement\ItemResponse;
use Dsc\MercadoLivre\Announcement\ItemResponseBuilder;
use Dsc\MercadoLivre\Announcement\PublishService;

class Announcement extends BaseService implements PublishService
{
    /**
     * @param AnnouncementInterface $announcement
     * @return ItemResponse
     */
    public function create(AnnouncementInterface $announcement)
    {
        $builder = new ItemResponseBuilder(
            $this->post('/items', $announcement)
        );
        return $builder->getResponse();
    }

    /**
     * @param AnnouncementInterface $announcement
     * @return ItemResponse
     */
    public function update(AnnouncementInterface $announcement)
    {
        $builder = new ItemResponseBuilder(
            $this->put('/items/' . $announcement->getId(), $announcement)
        );
        return $builder->getResponse();
    }

    /**
     * @param string $code
     * @return ItemResponse
     */
    public function delete($code)
    {
        $data = ['deleted' => "true"];
        $builder = new ItemResponseBuilder(
            $this->put('/items/' . $code, $data)
        );
        return $builder->getResponse();
    }
}