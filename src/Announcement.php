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

class Announcement extends BaseService implements AnnouncementManager
{
    /**
     * @param AnnouncementInterface $announcement
     * @return ItemResponse
     * @link http://developers.mercadolibre.com/list-products/#ListAnItem
     */
    public function create(AnnouncementInterface $announcement)
    {
        return $this->getResponse(
            $this->post('/items', $announcement),
            ItemResponse::class
        );
    }

    /**
     * @param string $code
     * @param array $data
     * @return ItemResponse
     * @link http://developers.mercadolibre.com/products-sync-listings/#Update-your-item
     */
    public function update($code, $data)
    {
        return $this->getResponse(
            $this->put('/items/' . $code, $data),
            ItemResponse::class
        );
    }

    /**
     * @param string $code
     * @return ItemResponse
     * @link http://developers.mercadolibre.com/products-sync-listings/#Delete-listing
     */
    public function delete($code)
    {
        $data = ['deleted' => 'true'];
        return $this->getResponse(
            $this->put('/items/' . $code, $data),
            ItemResponse::class
        );
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
        return $this->getResponse(
            $this->put('/items/' . $code, $data),
            ItemResponse::class
        );
    }

    /**
     * @param string $code
     * @param string $description
     * @return ItemResponse
     * @link http://developers.mercadolibre.com/item-description-2
     */
    public function changeDescription($code, $description)
    {
        $data = ['text' => $description];
        return $this->getResponse(
            $this->put('/items/' . $code . '/description', $data),
            ItemResponse::class
        );
    }
}