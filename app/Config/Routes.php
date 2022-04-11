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
// $routes->get('/', 'Home::index');

$routes->get('/', 'Pages::index');

$routes->get('/pages/profil', 'Pages::profil');
$routes->get('/pages/faq', 'Pages::faq');
$routes->get('/pages/permohonan_info', 'Pages::permohonan_info');

$routes->get('/pages/berita_grid', 'Pages::berita');
$routes->get('/pages/pengumuman_grid', 'Pages::pengumuman');
$routes->get('/pages/artikel_grid', 'Pages::artikel');
$routes->get('/pages/peristiwa_grid', 'Pages::peristiwa');
$routes->get('/pages/prosedur_grid', 'Pages::prosedur');
$routes->get('/pages/agenda_grid', 'Pages::agenda');

$routes->get('/pages/detail_berita', 'Pages::detail_berita');
$routes->get('/pages/detail_pengumuman', 'Pages::detail_pengumuman');
$routes->get('/pages/detail_artikel', 'Pages::detail_artikel');
$routes->get('/pages/detail_peristiwa', 'Pages::detail_peristiwa');
$routes->get('/pages/detail_prosedur', 'Pages::detail_prosedur');
$routes->get('/pages/detail_agenda', 'Pages::detail_agenda');


$routes->get('/frontend/register_cust', 'Frontend::register_cust');
$routes->get('/frontend/login_cust', 'Frontend::login_cust');
$routes->get('/login_cust', 'Frontend::login_cust');
$routes->get('/register_cust', 'Frontend::register_cust');
$routes->get('/dashboard_cust', 'Backend::dashboard_cust');
$routes->get('/logout_cust', 'AuthCust::logout');

$routes->get('/frontend/register_petugas', 'Frontend::register_petugas');
$routes->get('/frontend/login_petugas', 'Frontend::login_petugas');
$routes->get('/login_petugas', 'Frontend::login_petugas');
$routes->get('/register_petugas', 'Frontend::register_petugas');
$routes->get('/dashboard_petugas', 'Backend::dashboard_petugas');
$routes->get('/logout_petugas', 'AuthPetugas::logout');

// Pengaduan
$routes->get('/Pengaduan_online/profile', 'pengaduan_online::profile');
$routes->get('/Pengaduan_online/(:any)', 'Pengaduan_online::daftar/$1');
$routes->get('/Pengaduan_online', 'pengaduan_online::index');
$routes->get('/Pengaduan_online/form', 'pengaduan_online::form');
$routes->get('/delete/(:num)', 'pengaduan_online::delete/$1');
$routes->get('/Pengaduan_online/input', 'pengaduan_online::input');
$routes->get('/Pengaduan_online/update/(:num)', 'pengaduan_online::update/$1');
$routes->get('/Pengaduan_online/cancel/(:num)', 'pengaduan_online::cancel/$1');
$routes->get('/Pengaduan_online/detail/(:num)', 'pengaduan_online::detail/$1');
$routes->get('/Pengaduan_online/edit/(:num)', 'pengaduan_online::edit/$1');
$routes->get('/Pengaduan_online/tanggapan/(:num)', 'pengaduan_online::edit/$1');
$routes->get('/Pengaduan_online/rating/(:num)', 'pengaduan_online::rating/$1');

// Admin
$routes->get('/admin', 'Admin_pengaduan::index');
$routes->get('/admin/(:any)', 'Admin_pengaduan::daftar/$1');
$routes->get('/admin/tanggapan/(:num)', 'Admin_pengaduan::tanggapan/$1');
// $routes->get('/admin/input', 'Admin_pengaduan::input');
$routes->get('/admin/proses/(:num)', 'Admin_pengaduan::proses/$1');
$routes->get('/admin/detail/(:num)', 'Admin_pengaduan::detail/$1');


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
