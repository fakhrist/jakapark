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
$routes->get('/', 'Home::index');

//Payment
$routes->get('/payment', 'Payment::list');
$routes->get('/payment/add_method', 'Payment::insert');
$routes->post('/payment/add_method', 'Payment::insert_save');
$routes->get('/payment/channel/(:segment)', 'Payment::list_channel/$1');

$routes->get('/payment/channel_add/(:segment)', 'Payment::channel_add/$1');
$routes->post('/payment/channel_add', 'Payment::insert_channel');


//Profile
$routes->get('/profile', 'Profile::detail');
$routes->get('/profile/(:segment)', 'Profile::update/$1');
$routes->post('/profile/(:segment)', 'Profile::update_save/$1');

//Profile Cars Update
$routes->get('/car/', 'Car::insert');
$routes->post('/car/insert_car', 'Car::insert_save');
$routes->get('/car/(:segment)', 'Car::update/$1');
$routes->post('/car/(:segment)', 'Car::update_save/$1');
$routes->get('/car/delete/(:segment)', 'Car::delete/$1');

//Building 
$routes->get('/building/', 'Building::detail');
$routes->get('/building/insert', 'Building::insert');
$routes->post('/building/insert_building', 'Building::insert_save');
$routes->get('/building/delete/(:segment)', 'Building::delete/$1');
$routes->get('/building/rate/(:segment)', 'Building::rate_insert/$1');
$routes->post('/building/rate/', 'Building::rate_insertsave');
$routes->get('/building/rate_update/(:segment)', 'Building::rate_update/$1');
$routes->post('/building/rate_update', 'Building::rate_save');

//Level
$routes->get('/building/level/', 'Level::home');
$routes->get('/building/level/(:segment)', 'Level::level_detail/$1');
$routes->get('/building/insert_level/(:segment)', 'Level::insert/$1');
$routes->post('/building/insert_level', 'Level::insert_save');
$routes->get('/building/delete_level/(:segment)', 'Level::delete/$1');

//Section
$routes->get('/building/section/(:segment)', 'Section::section_detail/$1');
$routes->get('/building/insert_section/(:num)', 'Section::insert/$1');
$routes->post('/building/insert_section', 'Section::insert_save');
$routes->get('/building/delete_section/(:segment)', 'Section::delete/$1');

//Book Parking
$routes->get('/parking/', 'Booking::detail');
$routes->get('/parking/book', 'Booking::insert');
$routes->post('/parking/book', 'Booking::insert_save');
$routes->get('/parking/review/(:segment)', 'Booking::review/$1');
$routes->post('/parking/review', 'Booking::insert_review');
$routes->get('/parking/payment/(:segment)', 'Booking::payment/$1');
$routes->post('/parking/payment', 'Booking::insert_payment');
$routes->get('/parking/confirmation/(:segment)', 'Booking::confirmation/$1');
$routes->post('/parking/confirmation', 'Booking::paid');
$routes->post('/parking/search-service/', 'Booking::searchservice');
// $routes->get('/parking/payment/(:segment)', 'Booking::payment/$1');

$routes->get('/parking/book/(:segment)', 'Booking::delete/$1');

//Search on Parking Book
$routes->get('/parking/search-city/(:segment)', 'Booking::searchcity/$1');
$routes->post('/parking/search-building/', 'Booking::searchbuilding');
$routes->post('/parking/search-level/', 'Booking::searchlevel');
$routes->post('/parking/search-area/', 'Booking::searcharea');
$routes->post('/parking/search-space/', 'Booking::searchspace');

//TestAPI
$routes->get('/testapi', 'TestApi::showAPI');


$routes->get('/building/(:segment)', 'Building::update/$1');
$routes->post('/building/(:segment)', 'Building::update_save/$1');


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
