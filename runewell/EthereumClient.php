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
     public function gethExec($cmd)
     {
         $cmd = preg_replace('/\s+/', ' ', $cmd);
         $cmd = str_replace("'","\\'",$cmd);
         return exec("/usr/local/bin/geth --exec '".trim($cmd)."' attach http://".$this->config['node']['host'].":".$this->config['node']['port']);
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
