<?php declare(strict_types=1);
namespace fyrkat\myip\generator;

use \fyrkat\myip\IPAddress;

class DSONGenerator extends Generator {

	public function __toString(): string {
		$separators = [',', '.', '!', '?'];
		$time = explode(' ', microtime());
		$val = substr($time[0], 2, 4) & 3;
		if (substr($time[0], 2, 1) > 4) {
			return 'such "addr" is "' . $this->getAddress()->getAddress() . '"' . $separators[$val] . ' "family" is ' . $this->getAddress()->getIPVersion() . " wow\r\n";
		} else {
			return 'such "family" is ' . $this->getAddress()->getIPVersion() . $separators[$val] . ' "addr" is "' . $this->getAddress()->getAddress() . "\" wow\r\n";
		}
	}

	public function getType(): string {
		return 'text';
	}

}
