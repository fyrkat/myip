<?php declare(strict_types=1);
namespace fyrkat\myip\generator;

use \fyrkat\myip\IPAddress;

class XMLGenerator extends Generator {

	public function __toString(): string {
		$newline = $this->isText() ? "\r\n" : '';
		return '<?xml version="1.0" encoding="ASCII" standalone="no"?>' . $newline . '<address family="' . $this->getAddress()->getIPVersion() . '">' . $this->getAddress()->getAddress() . "</address>\r\n";
	}

}
