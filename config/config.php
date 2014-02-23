<?php

return array(

    // Layout path for standard view
    'layouts.path'                  => APP_PATH . '/layouts',

    // Standard slim config option for template path. This is fiddled
    // with to allow controller modules
    'templates.path'                => APP_PATH,

    // Set the default view object to use
    'view'                          => new \TLD\View\Standard(),

    // SlimController specific options
    'controller.class_prefix'       => '\\app',
    // 'controller.method_suffix'   => 'Action',
    'controller.template_suffix'    => 'phtml',

    // Version to broadcast is API responses
    'api.version'                   => 0.1,

    // ORM parameters
    'orm.dsn'           => 'mysql:host=localhost;dbname=slim',
    'orm.username'      => 'dev',
    'orm.password'      => 'dev'

);
