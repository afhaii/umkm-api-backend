<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');


$routes->group('api', static function ($routes) {

    // GET: Mengambil seluruh data UMKM
    $routes->get('umkm', 'Api\UmkmController::index');

    // GET: Mengambil satu data UMKM berdasarkan ID
    $routes->get('umkm/(:num)', 'Api\UmkmController::show/$1');

    // POST: Menambahkan data UMKM
    $routes->post('umkm', 'Api\UmkmController::create');

    // PUT: Memperbarui data UMKM berdasarkan ID
    $routes->put('umkm/(:num)', 'Api\UmkmController::update/$1');

    // DELETE: Menghapus data UMKM berdasarkan ID
    $routes->delete('umkm/(:num)', 'Api\UmkmController::delete/$1');
});
