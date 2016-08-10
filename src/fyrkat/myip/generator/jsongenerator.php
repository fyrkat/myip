<?php declare(strict_types=1);
namespace fyrkat\myip\generator;

use \fyrkat\myip\IPAddress;

class JSONGenerator extends Generator {

	public function __toString(): string {
		return str_replace(['    ', "\r\n", "\n"], ["\t", "\n", "\r\n"], json_encode([
			'addr' => $this->getAddress()->getAddress(),
			'family' => $this->getAddress()->getIPVersion(),
		], $this->isText() ? JSON_PRETTY_PRINT : 0)) . "\r\n";

	}

}
