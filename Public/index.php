<?php

require '../config/dev.php';
require dirname(__DIR__) . '/vendor/autoload.php';
use App\config\Router;

$router = new \App\config\Router();
$router->run();