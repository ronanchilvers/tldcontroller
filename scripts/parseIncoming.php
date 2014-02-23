<?php
define('APP_PATH', dirname(__DIR__));
require(APP_PATH . '/vendor/autoload.php');

$app = new \TLD\Slim(include(APP_PATH . '/config/config.php'));
// $app->addRoutes(include(APP_PATH . '/config/routes.php'));

ORM::configure(array(
    'connection_string'     => $app->config('orm.dsn'),
    'username'              => $app->config('orm.username'),
    'password'              => $app->config('orm.password'),
    'return_result_sets'    => true,
));

\TLD\Incoming::ParseNew();