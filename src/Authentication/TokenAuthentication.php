<?php

namespace WhoisApi\Authentication;

/**
 * Class PasswordAuthentication
 *
 * @package Neat\Salesforce\Authentication
 */
class TokenAuthentication extends Authentication
{
    /**
     * @var string api key
     */
    /**
     * PasswordAuthentication constructor.
     *
     * @param string $host *
     */
    public function __construct($host)
    {
        parent::__construct($host);
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->host . '/whoisserver/WhoisService';
    }
}
