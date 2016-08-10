<?php declare(strict_types=1);
namespace fyrkat\myip\generator;

use \fyrkat\myip\IPAddress;

class PlainGenerator extends Generator {

	public function __toString(): string {
		$newline = $this->isText() ? "\r\n" : '';
		return $this->getAddress()->getAddress() . $newline;
	}

	public function getType(): string {
		return 'text';
	}

}
