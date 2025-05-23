<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Dashboard::index');
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::loginProcess');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::registerProcess');

// Role Super Admin
$routes->get('/admin', 'Admin::index', ['filter' => 'auth:1,2']);
$routes->get('/superadmin', 'SuperAdmin::index', ['filter' => 'auth:1']);
$routes->get('/man_pengguna', 'Man_pengguna::index', ['filter' => 'auth:1,2']);

// Manajemen Data Sekolah
$routes->group('datasekolah', function ($routes) {
    $routes->get('/', 'Man_sekolah::index', ['filter' => 'auth:1']);
    $routes->get('createsekolah', 'Man_sekolah::createsekolah', ['filter' => 'auth:1']);
    $routes->post('storesekolah', 'Man_sekolah::storesekolah', ['filter' => 'auth:1']);
    $routes->get('detail/(:any)', 'Man_sekolah::detail/$1', ['filter' => 'auth:1']);
    $routes->get('edit/(:any)', 'Man_sekolah::edit/$1', ['filter' => 'auth:1']);
    $routes->post('editGo', 'Man_sekolah::editGo', ['filter' => 'auth:1']);
    $routes->get('on/(:any)', 'Man_sekolah::activate/$1', ['filter' => 'auth:1']);
    $routes->get('off/(:any)', 'Man_sekolah::deactivate/$1', ['filter' => 'auth:1']);
});


// Manajemen DPengguna
$routes->group('datapengguna', function ($routes) {
    $routes->get('/', 'Man_pengguna::index', ['filter' => 'auth:1,2']);
    $routes->get('createpengguna', 'Man_pengguna::createpengguna', ['filter' => 'auth:1,2']);
    $routes->post('storepengguna', 'Man_pengguna::storepengguna', ['filter' => 'auth:1,2']);
    $routes->get('detail/(:any)', 'Man_pengguna::detail/$1', ['filter' => 'auth:1,2']);
    $routes->get('edit/(:any)', 'Man_pengguna::edit/$1', ['filter' => 'auth:1,2']);
    $routes->post('editGo', 'Man_pengguna::editGo', ['filter' => 'auth:1,2']);
    $routes->get('on/(:any)', 'Man_pengguna::activate/$1', ['filter' => 'auth:1,2']);
    $routes->get('off/(:any)', 'Man_pengguna::deactivate/$1', ['filter' => 'auth:1,2']);
    $routes->get('resetpassword/(:any)', 'Man_pengguna::resetpassword/$1', ['filter' => 'auth:1,2']);
});

// ADMINISTRATOR KESISWAAN - KELAS
$routes->group('admin_kelas', function ($routes) {
    $routes->get('/', 'Admin_kelas::index');
    $routes->post('store', 'Admin_kelas::store');
    $routes->post('update/(:num)', 'Admin_kelas::update/$1');
});
// ADMINISTRATOR KESISWAAN - SISWA
$routes->group('admin_siswa', function ($routes) {
    $routes->get('/', 'Admin_siswa::index');
    $routes->get('createsiswa', 'Admin_siswa::createsiswa');
    $routes->post('store', 'Admin_siswa::store');
    $routes->get('edit/(:num)', 'Admin_siswa::edit/$1');
    $routes->get('detail/(:num)', 'Admin_siswa::detail/$1');
    $routes->post('updateGo', 'Admin_siswa::updateGo');
    $routes->get('importData', 'Admin_siswa::importData');
});

// ADMINISTRATOR KEPEGAWAIAN - JABATAN
$routes->group('admin_jabatan', function ($routes) {
    $routes->get('/', 'Admin_jabatan::index');
    $routes->get('create', 'Admin_jabatan::create');
    $routes->post('store', 'Admin_jabatan::store');
    $routes->get('edit/(:num)', 'Admin_jabatan::edit/$1');
    $routes->get('detail/(:num)', 'Admin_jabatan::detail/$1');
    $routes->post('updateGo', 'Admin_jabatan::updateGo');
    $routes->get('importData', 'Admin_jabatan::importData');
});

// ADMINISTRATOR KEPEGAWAIAN - PEGAWAI
$routes->group('admin_pegawai', function ($routes) {
    $routes->get('/', 'Admin_pegawai::index');
    $routes->get('create', 'Admin_pegawai::create');
    $routes->post('store', 'Admin_pegawai::store');
    $routes->get('edit/(:num)', 'Admin_pegawai::edit/$1');
    $routes->get('detail/(:num)', 'Admin_pegawai::detail/$1');
    $routes->post('updateGo', 'Admin_pegawai::updateGo');
    $routes->get('importData', 'Admin_pegawai::importData');
});



// ADMINISTRATOR AKADEMIK - TAHUN AJARAN 
$routes->group('admin_tahun_ajaran', function ($routes) {
    $routes->get('/', 'Admin_Akademik\Admin_tahun_ajaran::index');
    $routes->post('store', 'Admin_Akademik\Admin_tahun_ajaran::store');
    $routes->post('edit/(:num)', 'Admin_Akademik\Admin_tahun_ajaran::edit/$1');
    $routes->get('on/(:any)', 'Admin_Akademik\Admin_tahun_ajaran::activate/$1', ['filter' => 'auth:1,2']);
    $routes->get('off/(:any)', 'Admin_Akademik\Admin_tahun_ajaran::deactivate/$1', ['filter' => 'auth:1,2']);
});

// ADMINISTRATOR AKADEMIK - SEMESTER
$routes->group('admin_semester', function ($routes) {
    $routes->get('/', 'Admin_Akademik\Admin_semester::index');
    $routes->post('store', 'Admin_Akademik\Admin_semester::store');
    $routes->post('edit/(:num)', 'Admin_Akademik\Admin_semester::edit/$1');
});
