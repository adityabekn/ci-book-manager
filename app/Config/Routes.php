<?php

use App\Controllers\Home;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Home::class, 'index']);
$routes->get('get-all', [Home::class, 'getAll']);

$routes->post('add-book', [Home::class, 'doAdd']);
$routes->delete('delete-book', [Home::class, 'doDelete']);
