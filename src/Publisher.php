<?php
/**
 * Class Publisher
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Announcement\Announcement;
use Dsc\MercadoLivre\Announcement\ItemResponse;
use Dsc\MercadoLivre\Announcement\ItemResponseBuilder;
use Dsc\MercadoLivre\Announcement\PublishService;

class Publisher extends BaseService implements PublishService
{
    /**
     * @param Announcement $announcement
     * @return ItemResponse
     */
    public function create(Announcement $announcement)
    {
        $builder = new ItemResponseBuilder(
            $this->post('/items', $announcement)
        );
        return $builder->getResponse();
    }

    /**
     * @param Announcement $announcement
     * @return ItemResponse
     */
    public function update(Announcement $announcement)
    {
        $builder = new ItemResponseBuilder(
            $this->put('/items', $announcement)
        );
        return $builder->getResponse();
    }
}