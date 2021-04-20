<?php


namespace Dsc\MercadoLivre\Requests\Trends;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Requests\Service;

class TrendsService extends Service
{
    /**
     * @param $site
     * @return Collection
     */
    public function findTrend($site)
    {
        return $this->getResponse(
            $this->get("/trends/$site"),
            Trend::class
        );
    }

    /**
     * @param string $site
     * @param string $category
     * @return Collection
     */
    public function findByCategory($site, $category)
    {
        return $this->getResponse(
            $this->get("/trends/$site/$category"),
            Trend::class
        );
    }
}