<?php

namespace Runewell;

use JsonRPC\Client;

class EthereumClient
{
    /**
     * Main Obj
     */
    protected $main;

    /**
     * Ethereum Unit Map
     */
     public $unitMap = [
         'noether'=>      '0',
         'wei'=>          '1',
         'kwei'=>         '1000',
         'Kwei'=>         '1000',
         'babbage'=>      '1000',
         'femtoether'=>   '1000',
         'mwei'=>        '1000000',
         'Mwei'=>         '1000000',
         'lovelace'=>     '1000000',
         'picoether'=>    '1000000',
         'gwei'=>         '1000000000',
         'Gwei'=>         '1000000000',
         'shannon'=>      '1000000000',
         'nanoether'=>    '1000000000',
         'nano'=>         '1000000000',
         'szabo'=>        '1000000000000',
         'microether'=>   '1000000000000',
         'micro'=>        '1000000000000',
         'finney'=>       '1000000000000000',
         'milliether'=>    '1000000000000000',
         'milli'=>         '1000000000000000',
         'ether'=>        '1000000000000000000',
         'kether'=>       '1000000000000000000000',
         'grand'=>        '1000000000000000000000',
         'mether'=>       '1000000000000000000000000',
         'gether'=>       '1000000000000000000000000000',
         'tether'=>       '1000000000000000000000000000000'
     ];

     /**
      * Converts Numerical Hex String to Float
      * @param  String $hex numerical hex String
      * @return float decimal amount
      */
     public function hexToFloat($hex)
     {
         $dec = 0;
         $len = strlen($hex);
         for ($i = 1; $i <= $len; $i++) {
             $dec = bcadd($dec, bcmul(strval(hexdec($hex[$i - 1])), bcpow('16', strval($len - $i))));
         }
         return (float)$dec;
     }

     public function getAccountBalance($address, $unitType='ether')
     {
         $result = $this->exec('eth_getBalance', [$address, 'latest']);
         $balance = $this->hexToFloat($result) / (float)$this->unitMap[$unitType];
         return $balance;
     }

     /**
      * Execute RPC command
      * @param  String $command RPC command function namespace
      * @param  String or array $params  Optional parameters to pass to RPC
      * @return String
      */
     public function exec($command, $params)
     {
         return $this->main->exec($command, $params);
     }

    /**
     * Construct Ethereum client instance.
     *
     * @param $url Ethereum node URL
     */
    public function __construct($url)
    {
        $this->main = new Client($url);
        return $this;
    }
}
