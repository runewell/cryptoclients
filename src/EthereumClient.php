<?php

use JsonRPC\Client;

class EthereumClient
{
    /**
     * Construct Ethereum client instance.
     *
     * @param $url Ethereum node URL
     */
    public function __construct($url)
    {
        return new Client($url);
    }
}
