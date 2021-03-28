<?php
namespace Dsc\MercadoLivre;

/**
 * @author Diego Wagner <diegowagner4@gmail.com>
 */
interface MeliInterface
{
    /**
     * @return string
     */
    public function getClientId();

    /**
     * @param string $clientId
     */
    public function setClientId($clientId);

    /**
     * @return string
     */
    public function getClientSecret();

    /**
     * @param string $clientSecret
     */
    public function setClientSecret($clientSecret);

    /**
     * @return string
     */
    public function getUserId();

    /**
     * @param string $userId
     */
    public function setUserId($userId);

    /**
     * @return string
     */
    public function getTenantId();

    /**
     * @return Environment
     */
    public function getEnvironment();

    /**
     * @param Environment $siteId
     */
    public function setEnvironment(Environment $environment);
}