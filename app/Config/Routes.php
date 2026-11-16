<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');



$routes->group('api', ['filter' => 'cors'], static function ($routes) {

    // GET
    $routes->get('umkm', 'Api\UmkmController::index');

    // POST
    $routes->post('umkm', 'Api\UmkmController::create');

    // PUT
    $routes->put('umkm/(:num)', 'Api\UmkmController::update/$1');

    // DELETE
    $routes->delete('umkm/(:num)', 'Api\UmkmController::delete/$1');

    // OPTIONS: CORS Preflight
    $routes->options('umkm', static function () {
        return service('response')->setStatusCode(204);
    });

    $routes->options('umkm/(:num)', static function () {
        return service('response')->setStatusCode(204);
    });

});
