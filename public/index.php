<?php
define('APP_PATH', dirname(__DIR__));
require(APP_PATH . '/vendor/autoload.php');

$app = new \SlimController\Slim(include(APP_PATH . '/config/config.php'));

$app->addRoutes(array(
    '/'                 => 'Index\Controller:index',
    '/hello/:name'      => 'Hello\Controller:index'
));

$app->run();