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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/', 'Home::searchtiket');
$routes->get('/', 'Home::requestarmada');
$routes->get('reservasi', 'Reservasi::index');
$routes->get('reservasi/pulang', 'Reservasi::pulang');
$routes->get('reservasi/isidata', 'Reservasi::isidata');
$routes->get('reservasi/getmoredata', 'Reservasi::getmoredata');
$routes->get('reservasi/getFilterData', 'Reservasi::getFilterData');
$routes->get('reservasi/addbooking', 'Reservasi::addbooking');
$routes->get('reservasi/payment', 'Reservasi::payment');
$routes->get('reservasi/addpayment', 'Reservasi::addpayment');
$routes->get('reservasi/sentotp', 'Reservasi::sentotp');
$routes->get('reservasi/sentotpmail', 'Reservasi::sentotpmail');
$routes->get('reservasi/invoice', 'Reservasi::invoice');
$routes->get('reservasi/confirmotp', 'Reservasi::confirmotp');
$routes->get('kelas-armada', 'Kategori::index');
$routes->get('paket', 'Paket::index');
$routes->get('tiket', 'Tiket::index');
$routes->get('tiket/detail', 'Tiket::detail');
$routes->get('tentang-kami', 'Tentang_kami::index');
$routes->get('fasilitas', 'Fasilitas::index');
$routes->get('promosi', 'Promosi::index');
$routes->get('promosi/getmoredata', 'Promosi::getmoredata');

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
