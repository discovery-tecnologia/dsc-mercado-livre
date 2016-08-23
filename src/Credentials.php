<?php
namespace Dsc\MercadoLivre;
use Dsc\MercadoLivre\Environments\Production;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
class Credentials
{
    /**
     * @var string
     */
    protected $meli;

    /**
     * @var Production
     */
    protected $environment;

    /**
     * Credentials constructor.
     * @param MeliInterface $meli
     * @param Environment|null $environment
     */
    public function __construct(MeliInterface $meli, Environment $environment = null)
    {
        $this->meli = $meli;
        $this->environment = $environment ?: new Production();
    }

    /**
     * @return MeliInterface|string
     */
    public function getCredential()
    {
        return $this->meli;
    }

    /**
     * @return Environment
     */
    public function getEnvironment()
    {
        return $this->environment;
    }
}