<?php require dirname(__DIR__, 3) . implode(DIRECTORY_SEPARATOR, ['', 'src', '_autoload.php']);

header('Content-Type: text/plain');
header('Access-Control-Allow-Origin: *');
echo gethostbyaddr($_SERVER['REMOTE_ADDR']) . "\r\n";
