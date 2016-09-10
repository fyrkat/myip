<?php require dirname(__DIR__, 3) . implode(DIRECTORY_SEPARATOR, ['', 'src', '_autoload.php']);

header('Content-Type: text/plain');
echo gethostbyaddr($_SERVER['REMOTE_ADDR']) . "\r\n";
