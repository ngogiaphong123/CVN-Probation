<?php
define('BASE_DIR', str_replace('/public', '', __DIR__));
require __DIR__. '/../vendor/autoload.php';
require __DIR__. '/../core/helpers.php';

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(BASE_DIR);
$dotenv->load();

require __DIR__ . '/../src/routes.php';
