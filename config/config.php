<?php

return array(
    'api.version'                   => 0.1,
    'layouts.path'                  => APP_PATH . '/layouts',
    'templates.path'                => APP_PATH,
    'controller.class_prefix'       => '\\app',
    // 'controller.method_suffix'   => 'Action',
    'controller.template_suffix'    => 'phtml',
    'view'                          => new \TLD\View\Standard()
);