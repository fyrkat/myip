<?php declare(strict_types=1);
namespace fyrkat\myip\generator;

use \fyrkat\myip\IPAddress;

class MSGPackGenerator extends Generator {

	public function __toString(): string {
		$a = $this->getAddress()->getAddressBytes();
		$v = $this->getAddress()->getIPVersion();
		$s = chr(0x82); // dict with two items
		$s .= chr(0xa4) . 'addr';
		$s .= chr(0xc4) . ($v == 6 ? chr(16) : chr(4)); // address length
		$s .= $a;
		$s .= chr(0xa6) . 'family';
		$s .= chr(0xcc) . chr($v);
		return $s;
	}

	public function getType(): string {
		return 'application';
	}

}
