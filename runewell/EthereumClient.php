<?php

namespace Runewell;

class EthereumClient
{
    /**
     * Initial Variables
     */
     protected $config;

     /**
      * Execute Web3 Geth Command on remote server
      * @param  string $cmd javascript code
      * @return string      return string from server
      */
     public function exec($cmd)
     {
         $path = $this->config['server']['gethpath'];
         $host = $this->config['node']['host'];
         $port = $this->config['node']['port'];
         $cmd = preg_replace('/\s+/', ' ', $cmd);
         $cmd = str_replace("'","\\'",$cmd);
         return exec($path."geth --exec '".trim($cmd)."' attach http://".$host.":".$port);
     }

    /**
     * Construct Ethereum client instance.
     *
     * @param $url Ethereum node URL
     */
    public function __construct($url)
    {
        $this->config = $url['ethereum'];
        return $this;
    }
}
