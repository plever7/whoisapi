<?php

namespace WhoisApi\Service;
/**
 * Interface ServiceInterface
 *
 * @package WhoisApi\Service
 */

interface ServiceInterface
{
    /**
     * @param  $query array
     * @return mixed
     */
    public function getAllData($query);

}
