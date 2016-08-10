<?php require dirname(__DIR__) . implode(DIRECTORY_SEPARATOR, ['', 'src', '_autoload.php']);

use \fyrkat\myip\generator\Generator;
use \fyrkat\myip\generator\HTMLGenerator;
use \fyrkat\myip\generator\InvalidGenerator;
use \fyrkat\myip\IPAddress;

$generator = Generator::getGeneratorByAccept($_SERVER['HTTP_ACCEPT'], new IPAddress);

$acceptEncoding = preg_split('/\s*,\s*/', strtolower($_SERVER['HTTP_ACCEPT_ENCODING'] ?? ''));
if (function_exists('gzencode') && in_array('gzip', $acceptEncoding)) {
	$out = gzencode($generator->__toString(), 9);
	header('Content-Encoding: gzip');
} else {
	$out = $generator->__toString();
}
header('Content-Length: ' . strlen($out));
header('Content-Type: ' . $generator->getContentType() . ';charset=' . $generator->getCharset(), true, $generator->getHTTPCode());
die($out);
