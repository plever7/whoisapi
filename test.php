<?php
/**
 * Created by PhpStorm.
 * User: Sarvan
 * Date: 3/27/2019
 * Time: 11:12 PM
 */
require_once 'vendor/autoload.php';

use \WhoisApi\Service\REST;
use \GuzzleHttp\Client as Guzzle;
use \WhoisApi\Authentication\TokenAuthentication;
use \WhoisApi\Authentication\Authentication;

$rest = new REST(new Guzzle(), new TokenAuthentication(Authentication::ENDPOINT));
$client = new \WhoisApi\Client($rest);
$a = $client->getAllData(
    [
        'apiKey' => 'at_AoMwyXqorKJtSmHykUZOMjdArAeTG',
        'domainName' => 'ona.az'
    ]);
print_r($a);
