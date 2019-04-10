<?php

namespace WhoisApi\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use WhoisApi\Authentication\Authentication;

/**
 * Class REST
 *
 * @package WhoisApi\Service
 */
class REST implements ServiceInterface
{
    /**
     * @var Client
     */
    protected $adapter;

    /**
     * @var Authentication
     */
    protected $authentication;

    /**
     * REST constructor.
     *
     * @param Client $adapter
     * @param Authentication $authentication
     */
    public function __construct(Client $adapter, Authentication $authentication)
    {
        $this->adapter = $adapter;
        $this->authentication = $authentication;
    }

    /**
     * @param  $query array
     * @return array
     */
    public function getAllData($query)
    {
        $query['outputFormat'] = 'json';
        $parameters['query'] = $query;
        return $this->getResponse('GET', $this->authentication->getUrl(), $parameters);
    }

    /**
     * Get an API request response and handle possible exceptions.
     *
     * @param string $method get or post method
     * @param string $path endpoint
     * @param array $parameters guzzle parameters
     *
     * @return array|mixed|string
     */
    private function getResponse($method, $path, $parameters)
    {
        try {
            $response = $this->adapter->request($method, $path, $parameters);
            return $this->getResult($response);
        } catch (RequestException $exception) {
            throw new ClientException('Could not make a request: ' . $exception->getMessage());
        }
    }

    /**
     * @param  array $response response of rest api client
     * @return array|mixed
     */
    private function getResult($response)
    {
        $status = $response->getStatusCode();
        if ($status == 200) {
            return json_decode($response->getBody(), true);
        }
        return [$status => $response->getReasonPhrase()];
    }

}
