<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Pages');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Pages::index');
$routes->get('barbershops', 'Features::index');
$routes->get('(:any)/barbershops', 'Features::index');
$routes->get('afterLogin', 'Features::afterLogin',['filter' => 'auth']);
$routes->get('profile', 'Features::showProfile',['filter' => 'auth']);
$routes->get('specific/(:segment)', 'Features::displaySpecific/$1');
$routes->match(['get','post'],'search','Features::search');
$routes->match(['get', 'post'], 'profile/insert', 'Features::insert',['filter' => 'auth']);
$routes->match(['get', 'post'], 'features/store', 'Features::store',['filter' => 'auth']);
$routes->match(['get', 'post'], 'profile/delete', 'Features::delete',['filter' => 'auth']);
$routes->match(['get', 'post'], 'profile/edit', 'Features::edit',['filter' => 'auth']);
$routes->match(['get', 'post'], 'user_auth/register', 'User_Auth::register');
$routes->match(['get', 'post'], 'user_auth/login', 'User_Auth::login');
$routes->match(['get', 'post'], 'user_auth/logout', 'User_Auth::logout');
$routes->get('login', 'User_Auth::loginpage');
$routes->get('register', 'User_Auth::registerpage');
$routes->get('(:any)', 'Pages::view/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
