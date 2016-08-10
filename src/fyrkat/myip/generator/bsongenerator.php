<?php declare(strict_types=1);
namespace fyrkat\myip\generator;

use \fyrkat\myip\IPAddress;

class BSONGenerator extends Generator {

	public function __toString(): string {
		$a = $this->getAddress()->getAddressBytes();
		$v = $this->getAddress()->getIPVersion();
		$s = chr(0x5) . 'addr' . chr(0) . ($v==6?chr(16):chr(4)) . chr(0) . chr(0) . chr(0) . chr(0) . $a;
		$s .= chr(0x10) . 'family' . chr(0) . chr($v) . chr(0) . chr(0) . chr(0);
		$s = chr(strlen($s) + 5) . chr(0) . chr(0) . chr(0) . $s . chr(0);
		return $s;
	}

	public function getType(): string {
		return 'application';
	}

}
