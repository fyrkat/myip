<?php declare(strict_types=1);
namespace fyrkat\myip;

class IPAddress {

	private $ipAddress;

	public function __construct($ipAddress = null) {
		$this->ipAddress = $ipAddress ?? $_SERVER['REMOTE_ADDR'];
	}

	public function __toString() {
		return $this->getAddress();
	}

	public function isIPv4() {
		return strpos($this->ipAddress, ':') === false;
	}
	public function isIPv6() {
		return !$this->isIPv4();
	}
	public function getIPVersion() {
		return $this->isIPv4() ? '4' : '6';
	}
	public function getOppositeIPVersion() {
		return $this->isIPv4() ? '6' : '4';
	}

	public function getAddress() {
		return $this->ipAddress;
	}
	public function getAddressBytes() {
		return inet_pton($this->getAddress());
	}
	
}
