<?php

namespace Runewell;

use JsonRPC\Client;

class EthereumClient {

	protected $test = 'this is a test';

	public function __construct($str) {
		$this->str = $str;
	}

	public function printit($str) {
		print ($str) ? $str : $this->test;
	}

}