<?php
$url = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http';
$url .= '://';
$url .= $_SERVER['HTTP_HOST'];
$url .= dirname($_SERVER['REQUEST_URL']);
header('Location: $url', true, 301);
