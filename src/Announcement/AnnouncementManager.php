<?php
/**
 * Interface AnnouncementManager
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Announcement;

use Dsc\MercadoLivre\Requests\Product\Variation;

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
    public function update($code, array $data);

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

    /**
     * @param string $code
     * @param string $description
     * @return mixed
     */
    public function changeDescription($code, $description);

    /**
     * @param string $code
     * @param Variation $variation
     * @return mixed
     */
    public function addVariation($code, Variation $variation);

    /**
     * @param string $code
     * @param array $variations
     * @return mixed
     */
    public function changeVariation($code, array $variations);

    /**
     * @param string $code
     * @param string $variationCode
     * @return mixed
     */
    public function deleteVariation($code, $variationCode);
}