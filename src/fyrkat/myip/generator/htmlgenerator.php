<?php declare(strict_types=1);
namespace fyrkat\myip\generator;

use \fyrkat\myip\IPAddress;

class HTMLGenerator extends Generator {

	public function __toString(): string {
		$generator = $this;
		$addr = $generator->getAddress();
		$domain = null;
		if (preg_match('/(myip\.[a-z]+)$/', $_SERVER['HTTP_HOST'], $matches)) {
			$domain = $matches[0];
		}
		ob_start();
		require 'gui.php';
		return trim(preg_replace(['_/\\*.*\\*/_m', '_^\\s*//.*$_m', '_(\\t*|\\r?\\n\\s*)_m', '/: /', '/, /', '/ = /', '/ == /', '/ === /', '/ \{/'], ['', '', '', ':', ',', '=', '==', '===', '{'], str_replace(["\r\n", "\n"], ["\n", "\r\n"], ob_get_clean()))) . "\r\n";
	}

	public function getType(): string {
		return 'text';
	}

	public function getCharset(): string {
		return 'UTF-8';
	}

}
