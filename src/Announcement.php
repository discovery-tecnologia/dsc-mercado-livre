<?php
/**
 * Class Announcement
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre;

use Dsc\MercadoLivre\Announcement\Announcement as AnnouncementInterface;
use Dsc\MercadoLivre\Announcement\AnnouncementManager;
use Dsc\MercadoLivre\Announcement\ItemResponse;
use Dsc\MercadoLivre\Announcement\ItemResponseBuilder;

class Announcement extends BaseService implements AnnouncementManager
{
    /**
     * @param AnnouncementInterface $announcement
     * @return ItemResponse
     * @link http://developers.mercadolibre.com/list-products/#ListAnItem
     */
    public function create(AnnouncementInterface $announcement)
    {
        $builder = new ItemResponseBuilder(
            $this->post('/items', $announcement)
        );
        return $builder->getResponse();
    }

    /**
     * @param string $code
     * @param array $data
     * @return ItemResponse
     * @link http://developers.mercadolibre.com/products-sync-listings/#Update-your-item
     */
    public function update($code, $data)
    {
        $builder = new ItemResponseBuilder(
            $this->put('/items/' . $code, $data)
        );
        return $builder->getResponse();
    }

    /**
     * @param string $code
     * @return ItemResponse
     * @link http://developers.mercadolibre.com/products-sync-listings/#Delete-listing
     */
    public function delete($code)
    {
        $data = ['deleted' => "true"];
        $builder = new ItemResponseBuilder(
            $this->put('/items/' . $code, $data)
        );
        return $builder->getResponse();
    }

    /**
     * @param string $code
     * @param string $status
     * @return ItemResponse
     * @link http://developers.mercadolibre.com/products-sync-listings/#Changing-listing-status
     */
    public function changeStatus($code, $status)
    {
        $data = ['status' => $status];
        $builder = new ItemResponseBuilder(
            $this->put('/items/' . $code, $data)
        );
        return $builder->getResponse();
    }
}