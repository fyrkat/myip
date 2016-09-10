<?php require dirname(__DIR__, 3) . implode(DIRECTORY_SEPARATOR, ['', 'src', '_autoload.php']);

$out = gethostbyaddr($_SERVER['REMOTE_ADDR']) . "\r\n";

header('Content-Type: text/plain');
header('Content-Length: ' . strlen($out));
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Origin: *');
die($out);
