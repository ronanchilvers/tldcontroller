<?php

// Application Routes

return array(

    // Front end routes
    '/'         => 'Index\Controller:index',
    '/about'    => 'Index\Controller:about',

    // API routes
    // '/api(/)'            => 'Api\Controller:index'
    // 'get /api/submit'          => 'Api\Controller:foo',
    'post /api/submit'      => 'Api\Controller:submit',

    // Catch all method for invalid urls
    '/api(/:method)'   => 'Api\Controller:index',

);