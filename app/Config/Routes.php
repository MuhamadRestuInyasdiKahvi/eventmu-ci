<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'BerandaController::index');
$routes->get('/login', 'AuthController::index');
$routes->get('/register', 'AuthController::register');
$routes->get('/admin/dashboard', 'Home::index');

// Event
$routes->get('/event', 'EventController::index');
$routes->get('/event/add', 'EventController::create');
$routes->post('/event/create-event', 'EventController::store');
$routes->get('/event/edit/(:num)', 'EventController::edit/$1');
$routes->put('/event/update/(:num)', 'EventController::update/$1');
$routes->delete('/event/delete/(:num)', 'EventController::destroy/$1');

$routes->get('/event/export', 'EventController::export');
$routes->post('/event/import', 'EventController::import');
$routes->get('/event/export-pdf', 'EventController::exportPDF');

// Kategori Event
$routes->get('/kategori-event', 'EventKategoriController::index');
$routes->post('/kategori-event/add', 'EventKategoriController::store');
$routes->put('/kategori-event/edit/(:num)', 'EventKategoriController::update/$1');
$routes->delete('/kategori-event/delete/(:num)', 'EventKategoriController::destroy/$1');

// Tentang
$routes->get('/tentang-kami', 'TentangController::index');
$routes->get('/tentang-kami/add', 'TentangController::create');
$routes->post('/tentang-kami/create-tentang', 'TentangController::store');
$routes->get('/tentang-kami/edit/(:num)', 'TentangController::edit/$1');
$routes->put('/tentang-kami/update/(:num)', 'TentangController::update/$1');
$routes->delete('/tentang-kami/delete/(:num)', 'TentangController::destroy/$1');

// Cara Kerjasama
$routes->get('/kontak', 'KontakController::index');
$routes->get('/kontak/add', 'KontakController::create');
$routes->post('/kontak/create-kontak', 'KontakController::store');
$routes->get('/kontak/edit/(:num)', 'KontakController::edit/$1');
$routes->put('/kontak/update/(:num)', 'KontakController::update/$1');
$routes->delete('/kontak/delete/(:num)', 'KontakController::destroy/$1');

// API EventMu
$routes->resource('event-api', ['controller' => 'ApiEventController']);
$routes->resource('tentang-api', ['controller' => 'ApiTentangController']);
$routes->resource('kontak-kami', ['controller' => 'ApiKontakController']);



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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
