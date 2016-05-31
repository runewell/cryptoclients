<?php

class CryptoClients
{
    protected $eth;

    /**
     * Launch the generic crypto class.
     */
    public function __construct()
    {
        $this->eth = new EthereumClient(Config::get('crypto-clients.ethereum.node'));
    }
}
