<?php

class uriHelper
{
    private $base_url = "http://localhost/101skill/";

    /**
     * Define mutators for site base url
     *
     * @param string $url
     * @return string
     */

    public function baseUrl(string $url = null): string
    {
        return $this->base_url . $url;
    }

    /**
     * Define accessor method for site base url
     *
     * @return string
     */

    public function getBaseUrl(): string
    {
        return $this->base_url;
    }

    /**
     * Define base url for assets directory
     *
     * @param string $url
     * @return string
     */

    public function assetUrl(string $url = null): string
    {
        return $this->base_url . "assets/" . $url;
    }
}

$uriHelper = new uriHelper();
