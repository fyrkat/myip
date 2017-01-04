<?php declare(strict_types=1);
namespace fyrkat\myip\generator;

use \fyrkat\myip\IPAddress;

use \DomainException;

abstract class Generator {

	private /*IPAddress*/ $address;
	private /*string*/ $type;
	private /*string*/ $format;

	public static function getGeneratorByAccept(string $accept, IPAddress $address): Generator {
		foreach(explode(',', $accept) as $contentType) {
			@list($type, $format, $rest) = explode('/', $contentType);
			if(!isset($format) || isset($rest)) continue;
			foreach([$format, 'x-' . $format] as $f) switch($f) {
				case 'bson': return new BSONGenerator($address, $contentType);
				case 'dson': return new DSONGenerator($address, $contentType);
				case 'html': return new HTMLGenerator($address, $contentType);
				case 'json': return new JSONGenerator($address, $contentType);
				case 'msgpack': return new MSGPackGenerator($address, $contentType);
				case 'vnd.yaml':
				case 'yaml': return new YAMLGenerator($address, $contentType);
				case 'xml': return new XMLGenerator($address, $contentType);
				case '*':
				case 'plain': return new PlainGenerator($address, $contentType);
			}
		}
		return new InvalidGenerator($address, $contentType);
	}

	public static function isSpider() {
		return strpos($_SERVER['HTTP_USER_AGENT'], 'facebookexternalhit') === 0
		    || strpos($_SERVER['HTTP_USER_AGENT'], 'compatible; Googlebot/')
		    || strpos($_SERVER['HTTP_USER_AGENT'], 'compatible; bingbot/')
		    || strpos($_SERVER['HTTP_USER_AGENT'], 'Googlebot') === 0
		    || strpos($_SERVER['HTTP_USER_AGENT'], 'archive.org_bot') !== false
		;
	}

	abstract public function __toString(): string;

	public function __construct(IPAddress $address, string $contentType) {
		@list($type, $format, $rest) = explode('/', $contentType);
		if(!isset($format) || isset($rest))
			throw new DomainException('Illegal Content-type: ' . $contentType);
		if(!in_array($type, ['application', 'text', '*']))
			throw new DomainException('Illegal type: ' . $type);
		$this->address = $address;
		$this->type = $type;
		$this->format = $format;
	}

	public function isApplication(): bool {
		return $this->type === 'application';
	}

	public function isText(): bool {
		return $this->type === 'text' || $this->type === '*';
	}

	public function getContentType(): string {
		if ($this->getFormat() == '*')
			return $this->getType() . '/plain';
		return $this->getType() . '/' . $this->getFormat();
	}

	public function getAddress(): IPAddress {
		return $this->address;
	}

	public function getType(): string {
		return $this->type;
	}

	public function getFormat(): string {
		return $this->format;
	}

	public function getHTTPCode(): int {
		return 200;
	}

	public function getCharset(): string {
		return 'ASCII';
	}

}
