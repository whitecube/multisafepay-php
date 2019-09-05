<?php

namespace Whitecube\MultiSafepay;

class Client {

    /**
     * The MultiSafepay api key
     *
     * @var string
     */
    protected $api_key;

    /**
     * The application environment
     *
     * @var string
     */
    protected $environment;

    /**
     * The guzzle instance
     *
     * @var \GuzzleHttp\Client
     */
    protected $http;

    public function __construct($environment, $api_key) {
        $this->api_key = $api_key;
        $this->environment($environment);
        $this->http = $this->getHttpClient();
    }

    /**
     * Set the environment
     *
     * @var $environment string
     */
    protected function environment($environment)
    {
        if ($environment !== 'production' && $environment !== 'test') {
            throw new \InvalidArgumentException('Invalid environment specified. Allowed: production, test');
        }

        $this->environment = $environment;

        return $this;
    }

    /**
     * Get the API endpoint.
     *
     * @return string
     */
    protected function getApiEndpoint()
    {
        if ($this->environment === 'test') {
            return 'https://testapi.multisafepay.com/v1/json/';
        }

        return 'https://api.multisafepay.com/v1/json/';
    }

    /**
     * Get the API key
     *
     * @return string
     */
    public function getApiKey()
    {
        return $this->api_key;
    }

    /**
     * Create the Guzzle Http instance
     *
     * @return GuzzleHttp\Client
     */
    protected function getHttpClient()
    {
        return new \GuzzleHttp\Client([
            'base_uri' => $this->getApiEndpoint()
        ]);
    }

    /**
     * Get the Guzzle Http instance
     *
     * @return \GuzzleHttp\Client|GuzzleHttp\Client
     */
    public function http()
    {
        return $this->http;
    }

    /**
     * Access the Orders API
     *
     * @return Api\Orders
     */
    public function orders()
    {
        return new Api\Orders($this);
    }

    /**
     * Access the Gateways API
     *
     * @return Api\Gateways
     */
    public function gateways()
    {
        return new Api\Gateways($this);
    }

    /**
     * Access the Issuers API
     *
     * @return Api\Issuers
     */
    public function issuers()
    {
        return new Api\Issuers($this);
    }
}
