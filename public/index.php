<?php
define('APP_PATH', dirname(__DIR__));
require(APP_PATH . '/vendor/autoload.php');

$app = new \SlimController\Slim(include(APP_PATH . '/config/config.php'));

$app->addRoutes(array(

    // Front end routes
    '/'                 => 'Index\Controller:index',
    '/about'            => 'Index\Controller:about',

    // API routes
    '/api(/)'              => 'Api\Controller:index'

));

$app->run();