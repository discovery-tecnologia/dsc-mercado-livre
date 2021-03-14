<?php
/**
 * Class CategoryService
 *
 * @author Diego Wagner <diegowagner4@gmail.com>
 * http://www.discoverytecnologia.com.br
 */
namespace Dsc\MercadoLivre\Requests\Category;

use Doctrine\Common\Collections\Collection;
use Dsc\MercadoLivre\Requests\Service;

class CategoryService extends Service
{
    /**
     * @param $site
     * @return Category
     */
    public function findCategories($site)
    {
        return $this->getResponse(
            $this->get("/sites/$site/categories"),
            Category::class
        );
    }

    /**
     * @param string $code
     * @return Category
     */
    public function findCategory($code)
    {
        return $this->getResponse(
            $this->get("/categories/$code"),
            Category::class
        );
    }

    /**
     * @param string $code
     * @return Collection
     */
    public function findCategoryAttributes($code)
    {
        return $this->getResponse(
            $this->get("/categories/$code/attributes"),
            Attribute::class
        );
    }

    /**
     * @param string $code
     * @return Collection
     */
    public function findCategoryListingTypes($code)
    {
        return $this->getResponse(
            $this->get("/categories/$code/listing_types"),
            ListingType::class
        );
    }

    /**
     * @param string $code
     * @return Collection
     */
    public function findCategorySaleTerms($code)
    {
        return $this->getResponse(
            $this->get("/categories/$code/sale_terms"),
            SaleTerm::class
        );
    }

    /**
     * @param string $site
     * @param string $title
     * @return Predictor
     */
    public function findCategoryPredictor($site, $title)
    {
        return $this->getResponse(
            $this->get(
                "/sites/$site/domain_discovery/search", [
                    "q" => $title
                ]
            ),
            Predictor::class
        );
    }
}
