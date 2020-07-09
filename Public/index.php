<?php

require dirname(__DIR__) . '/controller/Backend/bddID.php';
require dirname(__DIR__) . '/vendor/autoload.php';
use App\model\Router;

$router = new \App\model\Router();
$router->run();