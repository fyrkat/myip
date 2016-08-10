<?php declare(strict_types=1);
namespace fyrkat\myip\generator;

use \fyrkat\myip\IPAddress;

class InvalidGenerator extends Generator {

	public function __toString(): string {
		return '';
	}

	public function getHTTPCode(): int {
		return 405;
	}

	public function getType(): string {
		return 'application';
	}

	public function getFormat(): string {
		return 'x-empty';
	}

}
