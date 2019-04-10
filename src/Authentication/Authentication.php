<?php

namespace WhoisApi\Authentication;


/**
 * Class Authentication
 *
 * @package WhoisApi\Authentication
 */
abstract class Authentication
{
    /**
     * Endpoint
     */
    const ENDPOINT = 'https://www.whoisxmlapi.com';
    /**
     * @var string
     */
    protected $host;

    /**
     * Authentication constructor.
     *
     * @param string $host
     */
    public function __construct($host)
    {
        $this->host = $host;
    }

    /**
     * @return string
     */
    abstract public function getUrl();
}
