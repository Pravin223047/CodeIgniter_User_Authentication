<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('auth/logout', 'Auth::logout');

$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('/dashboard/profile', 'Dashboard::profile');

});

$routes->get('/auth', 'Auth::index');
$routes->post('auth/login', 'Auth::login');
// $routes->group('', ['filter' => 'AlreadyLoggedIn'], function ($routes) {

// });

$routes->post('auth/check', 'Auth::check');

?>