<?php

namespace Runewell;

class CryptoClients
{
    /**
     * The Cryptos being used.
     *
     * @var eth Ethereum
     */
    protected $eth;

    /**
     * Create CryptoClients object
     *
     * @param Array $configArr configuration array
     */
    public function __construct($configArr=[])
    {
        if (isset($configArr['ethereum']))
        {
            $this->eth = new EthereumClient($configArr['ethereum']['node']);
        }

        return $this;
    }

    public function test()
    {
        print 'test';
    }
}
