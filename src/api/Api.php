<?php

namespace Whitecube\MultiSafepay\Api;

use Psr\Http\Message\ResponseInterface;
use Whitecube\MultiSafepay\Client;

class Api
{
    /**
     * HultiSafepay API Client.
     *
     * @var Client
     */
    protected $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Execute an Http GET request.
     *
     * @param $path
     * @param array $parameters
     * @return mixed
     */
    protected function get($path, array $parameters = [])
    {
        if (count($parameters) > 0) {
            $path .= '?' . http_build_query($parameters);
        }

        $response = $this->client->http()->get($path, [
            'headers' => [
                'api_key' => $this->client->getApiKey()
            ]
        ]);

        return $this->parseResponse($response);
    }

    /**
     * Execute an http POST request.
     *
     * @param $path
     * @param array $parameters
     * @param array $body
     * @return mixed
     */
    protected function post($path, array $parameters = [], $body = [])
    {
        if (count($parameters) > 0) {
            $path .= '?' . http_build_query($parameters);
        }

        $body = mb_convert_encoding(json_encode($body), 'UTF-8');

        $response = $this->client->http()->post($path, [
            'body' => $body,
            'headers' => [
                'api_key' => $this->client->getApiKey()
            ]
        ]);

        return $this->parseResponse($response);
    }

    /**
     * Execute an http PATCH request.
     *
     * @param $path
     * @param array $parameters
     * @param array $body
     * @return mixed
     */
    protected function patch($path, array $parameters = [], $body = [])
    {
        if (count($parameters) > 0) {
            $path .= '?' . http_build_query($parameters);
        }

        $body = json_encode($body);

        $response = $this->client->http()->patch($path, [], $body);

        return $this->parseResponse($response);
    }

    /**
     * Parse the response.
     *
     * @param ResponseInterface $response
     * @return mixed
     * @throws \Exception
     */
    protected function parseResponse(ResponseInterface $response)
    {
        $response = json_decode($response->getBody()->getContents());

        if (isset($response->success) && $response->success) {
            return $response->data;
        }

        throw new \Exception($response->error_info, $response->error_code);
    }
}
