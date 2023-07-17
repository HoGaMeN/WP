<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
$routes->get('/', 'Barang::index');
$routes->get('login', 'Barang::login');
$routes->get('register', 'Barang::register');
$routes->get('profil', 'Page::profil', ['filter' => 'role:pembeli,penjual']);
$routes->get('daftar_penjual', 'Page::daftar_penjual', ['filter' => 'role:pembeli']);
$routes->post('daftar_penjual/daftar', 'Barang::penjual_simpan', ['filter' => 'role:pembeli']);
$routes->get('barang/delete/(:num)', 'Barang::delete/$1', ['filter' => 'role:penjual']); // Ubah URL route sesuai kebutuhan
$routes->get('barang/edit_barang/(:any)', 'Barang::edit_barang/$1', ['filter' => 'role:penjual']);
$routes->post('penjual/edit_barang/simpan/(:num)', 'Barang::update/$1', ['filter' => 'role:penjual']);
$routes->get('barang/cari', 'Barang::search');
$routes->get('toko/cari/(:num)', 'Barang::search_b_toko/$1');
$routes->get('toko/(:num)', 'Barang::toko/$1');
$routes->get('barang/detail/(:num)', 'Barang::pembeli_detail_barang/$1');
$routes->get('pembeli/keranjang', 'Barang::keranjang', ['filter' => 'role:pembeli,penjual']);
$routes->get('pembeli/tambah-ke-keranjang/(:num)', 'Barang::tambahKeKeranjang/$1', ['filter' => 'role:pembeli,penjual']);
$routes->get('pembeli/checkout', 'Barang::checkout', ['filter' => 'role:pembeli,penjual']);
// $routes->get('profil', 'Page::profil', ['filter' => 'role:penjual']);
// $routes->get('register/getDesaByKecamatan/(:segment)', 'Barang::getDesaByKecamatan/$1');
$routes->get('penjual/barang', 'Barang::barang', ['filter' => 'role:penjual']);
$routes->get('penjual/barang/index', 'Barang::barang', ['filter' => 'role:penjual']);
$routes->get('barang', 'Page::daftar_barang');
$routes->get('penjual/barang/detail/(:any)', 'Barang::detail/$1', ['filter' => 'role:penjual']);
$routes->get('pembeli/barang/detail/(:any)', 'Barang::detail_barang/$1', ['filter' => 'role:penjual']);
$routes->get('penjual/tambah_barang', 'Barang::tambah_barang', ['filter' => 'role:penjual']);
$routes->post('penjual/tambah_barang/simpan', 'Barang::save', ['filter' => 'role:penjual']);


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
