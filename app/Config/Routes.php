<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

$routes->get('/tbtk_registrasi/finish/(:segment)', 'Tbtk_registrasi::finish/$1');
$routes->get('/sd_registrasi/finish/(:segment)', 'Sd_registrasi::finish/$1');
$routes->get('/smp_registrasi/finish/(:segment)', 'Smp_registrasi::finish/$1');

$routes->get('/tbtk', 'Tbtk::index',['filter' => 'loginAuth']);
$routes->get('/tbtk/data_calon_siswa/(:segment)', 'Tbtk::data_calon_siswa/$1',['filter' => 'loginAuth']);
$routes->get('/tbtk/penggantian_password/(:segment)', 'Tbtk::penggantian_password/$1',['filter' => 'loginAuth']);
$routes->get('/tbtk/change_password/(:segment)', 'Tbtk::change_password/$1',['filter' => 'loginAuth']);
$routes->get('/tbtk/ubah_data_pendaftaran/(:segment)', 'Tbtk::ubah_data_pendaftaran/$1',['filter' => 'loginAuth']);
$routes->get('/tbtk/update_data_pendaftaran/(:segment)', 'Tbtk::update_data_pendaftaran/$1',['filter' => 'loginAuth']);
$routes->get('/tbtk/data_dapodik/(:segment)', 'Tbtk::data_dapodik/$1',['filter' => 'loginAuth']);
$routes->get('/tbtk/tambah_data_dapodik/(:segment)', 'Tbtk::tambah_data_dapodik/$1',['filter' => 'loginAuth']);
$routes->get('/tbtk/ubah_data_dapodik/(:segment)', 'Tbtk::ubah_data_dapodik/$1',['filter' => 'loginAuth']);
$routes->get('/tbtk/update_data_dapodik/(:segment)', 'Tbtk::update_data_dapodik/$1',['filter' => 'loginAuth']);
$routes->get('/tbtk/data_pernyataan/(:segment)', 'Tbtk::data_pernyataan/$1',['filter' => 'loginAuth']);
$routes->get('/tbtk/tambah_data_pernyataan/(:segment)', 'Tbtk::tambah_data_pernyataan/$1',['filter' => 'loginAuth']);
$routes->get('/tbtk/data_keuangan/(:segment)', 'Tbtk::data_keuangan/$1',['filter' => 'loginAuth']);
$routes->get('/tbtk/tambah_data_keuangan/(:segment)', 'Tbtk::tambah_data_keuangan/$1',['filter' => 'loginAuth']);
$routes->get('/tbtk/pembayaran_tahap_1/(:segment)', 'Tbtk::pembayaran_tahap_1/$1',['filter' => 'loginAuth']);
$routes->get('/tbtk/bukti_pembayaran_tahap_1/(:segment)', 'Tbtk::bukti_pembayaran_tahap_1/$1',['filter' => 'loginAuth']);
$routes->get('/tbtk/pembayaran_tahap_2/(:segment)', 'Tbtk::pembayaran_tahap_2/$1',['filter' => 'loginAuth']);
$routes->get('/tbtk/bukti_pembayaran_tahap_2/(:segment)', 'Tbtk::bukti_pembayaran_tahap_2/$1',['filter' => 'loginAuth']);
$routes->get('/tbtk/pembayaran_tahap_3/(:segment)', 'Tbtk::pembayaran_tahap_3/$1',['filter' => 'loginAuth']);
$routes->get('/tbtk/bukti_pembayaran_tahap_3/(:segment)', 'Tbtk::bukti_pembayaran_tahap_3/$1',['filter' => 'loginAuth']);
$routes->get('/tbtk/pembayaran_tahap_4/(:segment)', 'Tbtk::pembayaran_tahap_4/$1',['filter' => 'loginAuth']);
$routes->get('/tbtk/bukti_pembayaran_tahap_4/(:segment)', 'Tbtk::bukti_pembayaran_tahap_4/$1',['filter' => 'loginAuth']);

$routes->get('/sd', 'Sd::index',['filter' => 'loginAuth']);
$routes->get('/sd/data_calon_siswa/(:segment)', 'Sd::data_calon_siswa/$1',['filter' => 'loginAuth']);
$routes->get('/sd/penggantian_password/(:segment)', 'Sd::penggantian_password/$1',['filter' => 'loginAuth']);
$routes->get('/sd/change_password/(:segment)', 'Sd::change_password/$1',['filter' => 'loginAuth']);
$routes->get('/sd/ubah_data_pendaftaran/(:segment)', 'Sd::ubah_data_pendaftaran/$1',['filter' => 'loginAuth']);
$routes->get('/sd/update_data_pendaftaran/(:segment)', 'Sd::update_data_pendaftaran/$1',['filter' => 'loginAuth']);
$routes->get('/sd/data_dapodik/(:segment)', 'Sd::data_dapodik/$1',['filter' => 'loginAuth']);
$routes->get('/sd/tambah_data_dapodik/(:segment)', 'Sd::tambah_data_dapodik/$1',['filter' => 'loginAuth']);
$routes->get('/sd/ubah_data_dapodik/(:segment)', 'Sd::ubah_data_dapodik/$1',['filter' => 'loginAuth']);
$routes->get('/sd/update_data_dapodik/(:segment)', 'Sd::update_data_dapodik/$1',['filter' => 'loginAuth']);
$routes->get('/sd/data_pernyataan/(:segment)', 'Sd::data_pernyataan/$1',['filter' => 'loginAuth']);
$routes->get('/sd/tambah_data_pernyataan/(:segment)', 'Sd::tambah_data_pernyataan/$1',['filter' => 'loginAuth']);
$routes->get('/sd/data_keuangan/(:segment)', 'Sd::data_keuangan/$1',['filter' => 'loginAuth']);
$routes->get('/sd/tambah_data_keuangan/(:segment)', 'Sd::tambah_data_keuangan/$1',['filter' => 'loginAuth']);
$routes->get('/sd/pembayaran_tahap_1/(:segment)', 'Sd::pembayaran_tahap_1/$1',['filter' => 'loginAuth']);
$routes->get('/sd/bukti_pembayaran_tahap_1/(:segment)', 'Sd::bukti_pembayaran_tahap_1/$1',['filter' => 'loginAuth']);
$routes->get('/sd/pembayaran_tahap_2/(:segment)', 'Sd::pembayaran_tahap_2/$1',['filter' => 'loginAuth']);
$routes->get('/sd/bukti_pembayaran_tahap_2/(:segment)', 'Sd::bukti_pembayaran_tahap_2/$1',['filter' => 'loginAuth']);
$routes->get('/sd/pembayaran_tahap_3/(:segment)', 'Sd::pembayaran_tahap_3/$1',['filter' => 'loginAuth']);
$routes->get('/sd/bukti_pembayaran_tahap_3/(:segment)', 'Sd::bukti_pembayaran_tahap_3/$1',['filter' => 'loginAuth']);
$routes->get('/sd/pembayaran_tahap_4/(:segment)', 'Sd::pembayaran_tahap_4/$1',['filter' => 'loginAuth']);
$routes->get('/sd/bukti_pembayaran_tahap_4/(:segment)', 'Sd::bukti_pembayaran_tahap_4/$1',['filter' => 'loginAuth']);

$routes->get('/smp', 'Smp::index',['filter' => 'loginAuth']);
$routes->get('/smp/data_calon_siswa/(:segment)', 'Smp::data_calon_siswa/$1',['filter' => 'loginAuth']);
$routes->get('/smp/penggantian_password/(:segment)', 'Smp::penggantian_password/$1',['filter' => 'loginAuth']);
$routes->get('/smp/change_password/(:segment)', 'Smp::change_password/$1',['filter' => 'loginAuth']);
$routes->get('/smp/ubah_data_pendaftaran/(:segment)', 'Smp::ubah_data_pendaftaran/$1',['filter' => 'loginAuth']);
$routes->get('/smp/update_data_pendaftaran/(:segment)', 'Smp::update_data_pendaftaran/$1',['filter' => 'loginAuth']);
$routes->get('/smp/data_dapodik/(:segment)', 'Smp::data_dapodik/$1',['filter' => 'loginAuth']);
$routes->get('/smp/tambah_data_dapodik/(:segment)', 'Smp::tambah_data_dapodik/$1',['filter' => 'loginAuth']);
$routes->get('/smp/ubah_data_dapodik/(:segment)', 'Smp::ubah_data_dapodik/$1',['filter' => 'loginAuth']);
$routes->get('/smp/update_data_dapodik/(:segment)', 'Smp::update_data_dapodik/$1',['filter' => 'loginAuth']);
$routes->get('/smp/data_pernyataan/(:segment)', 'Smp::data_pernyataan/$1',['filter' => 'loginAuth']);
$routes->get('/smp/tambah_data_pernyataan/(:segment)', 'Smp::tambah_data_pernyataan/$1',['filter' => 'loginAuth']);
$routes->get('/smp/data_keuangan/(:segment)', 'Smp::data_keuangan/$1',['filter' => 'loginAuth']);
$routes->get('/smp/tambah_data_keuangan/(:segment)', 'Smp::tambah_data_keuangan/$1',['filter' => 'loginAuth']);
$routes->get('/smp/pembayaran_tahap_1/(:segment)', 'Smp::pembayaran_tahap_1/$1',['filter' => 'loginAuth']);
$routes->get('/smp/bukti_pembayaran_tahap_1/(:segment)', 'Smp::bukti_pembayaran_tahap_1/$1',['filter' => 'loginAuth']);
$routes->get('/smp/pembayaran_tahap_2/(:segment)', 'Smp::pembayaran_tahap_2/$1',['filter' => 'loginAuth']);
$routes->get('/smp/bukti_pembayaran_tahap_2/(:segment)', 'Smp::bukti_pembayaran_tahap_2/$1',['filter' => 'loginAuth']);
$routes->get('/smp/pembayaran_tahap_3/(:segment)', 'Smp::pembayaran_tahap_3/$1',['filter' => 'loginAuth']);
$routes->get('/smp/bukti_pembayaran_tahap_3/(:segment)', 'Smp::bukti_pembayaran_tahap_3/$1',['filter' => 'loginAuth']);
$routes->get('/smp/pembayaran_tahap_4/(:segment)', 'Smp::pembayaran_tahap_4/$1',['filter' => 'loginAuth']);
$routes->get('/smp/bukti_pembayaran_tahap_4/(:segment)', 'Smp::bukti_pembayaran_tahap_4/$1',['filter' => 'loginAuth']);

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}