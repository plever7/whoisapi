<?php

namespace WhoisApi;
use WhoisApi\Service\ClientException;
use WhoisApi\Service\ServiceInterface;

class Client
{
    /**
     * @var ServiceInterface
     */
    protected $service;

    /**
     * Client constructor.
     *
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @param array  $query
     * @return mixed
     */
    public function getAllData($query)
    {
        try {
            return $this->service->getAllData($query);
        } catch (\Exception $e) {
            throw new ClientException('[SERVICE] ' . $e->getMessage());
        }
    }

}
