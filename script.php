<?php
// https://github.com/matthiasmullie/minify

// Find autoload.php
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
  require __DIR__ . '/vendor/autoload.php';
} elseif (file_exists(__DIR__ . '/vendor/autoload.php')) {
  require __DIR__ . '/vendor/autoload.php';
} else {
  header('HTTP/1.1 500 Internal Server Error');
  echo "autoload.php not found";
  exit(1);
}

use MatthiasMullie\Minify;

$sourcePath = './themes/greenstone/css/style.css';
$minifier = new Minify\CSS($sourcePath);
$minifier->add('./themes/greenstone/css/responsive.css');

$minifiedPath = './themes/greenstone/css/greenstone.min.css';
$minifier->minify($minifiedPath);