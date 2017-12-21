<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

// Router::plugin(
//     'Users',
//     ['path' => '/users'],
//     function (RouteBuilder $routes) {
//         $routes->fallbacks(DashedRoute::class);
//     }
// );

//Added for Admin Routing
Router::prefix('admin', function ($routes) {
    $routes->plugin('Users', function ($routes) {
        $routes->fallbacks(DashedRoute::class);
        $routes->connect('/:controller');
    });
});


