<?php declare(strict_types=1);
namespace fyrkat\myip\generator;

use \fyrkat\myip\IPAddress;

class YAMLGenerator extends Generator {

	public function __toString(): string {
		return "addr: " . $this->getAddress()->getAddress() . "\r\nfamily: ipv" . $this->getAddress()->getIPVersion() . "\r\n";
	}

	public function getType(): string {
		return 'text';
	}

	public function getFormat(): string {
		return 'vnd.yaml';
	}

}
