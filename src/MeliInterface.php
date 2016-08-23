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
    public function getAccessToken();

    /**
     * @param string $accessToken
     */
    public function setAccessToken($accessToken);

    /**
     * @return string
     */
    public function getRefreshToken();

    /**
     * @param string $refreshToken
     */
    public function setRefreshToken($refreshToken);
}