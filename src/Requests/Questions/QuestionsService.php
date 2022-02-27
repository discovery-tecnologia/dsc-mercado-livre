<?php

namespace Dsc\MercadoLivre\Requests\Questions;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Requests\Service;

class QuestionsService extends Service
{
    const BASE_URL = "/my/received_questions/search";

    /**
     * @param $site
     * @return Collection
     */
    public function all($site)
    {
        return $this->getResponse(
            $this->get(self::BASE_URL . "/$site"),
            Questions::class
        );
    }

    /**
     * @param string $status
     * @return Collection
     */
    public function filterByStatus($status)
    {
        return $this->getResponse(
            $this->get(sprintf("%s?status=%s", self::BASE_URL, $status)),
            Questions::class
        );
    }
}