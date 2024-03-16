<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Auth::index');
$routes->get('Dashboard', 'Dashboard::index');

//halaman login & daftar
$routes->get('Auth', 'Auth::index');
$routes->post('Auth/login', 'Auth::login');
$routes->get('Auth/register', 'Auth::register');
$routes->post('Auth/daftar', 'Auth::daftar');

//halaman Logout
$routes->get('Auth/logout', 'Auth::logout');

//halaman berkas
// $routes->get('Dokumen', 'Dokumen::index');
// $routes->get('Dokumen/tambah', 'Dokumen::tambah');

$routes->get('Periode', 'Periode::index');
$routes->post('Periode/tambah', 'Periode::tambah');
$routes->post('Periode/edit/(:segment)', 'Periode::edit/$1');
$routes->delete('Periode/hapus/(:segment)', 'Periode::hapus/$1');

$routes->get('Kategori', 'Kategori::index');
$routes->post('Kategori/tambah', 'Kategori::tambah');
$routes->post('Kategori/edit/(:segment)', 'Kategori::edit/$1');
$routes->delete('Kategori/hapus/(:segment)', 'Kategori::hapus/$1');

$routes->get('Arsip', 'Arsip::index');
$routes->post('Arsip/tambahSKPB', 'Arsip::tambahSKPB');
$routes->post('Arsip/editSKPB/(:segment)', 'Arsip::editSKPB/$1');
$routes->post('Arsip/ambil_data_skpb', 'Arsip::ambil_data_skpb');
$routes->delete('Arsip/hapusSKPB/(:segment)', 'Arsip::hapusSKPB/$1');

$routes->post('Arsip/tambahRAB', 'Arsip::tambahRAB');
$routes->post('Arsip/editRAB/(:segment)', 'Arsip::editRAB/$1');
$routes->post('Arsip/ambil_data_rab', 'Arsip::ambil_data_rab');
$routes->delete('Arsip/hapusRAB/(:segment)', 'Arsip::hapusRAB/$1');

$routes->post('Arsip/tambahASM', 'Arsip::tambahASM');
$routes->post('Arsip/editASM/(:segment)', 'Arsip::editASM/$1');
$routes->post('Arsip/ambil_data_aSM', 'Arsip::ambil_data_aSM');
$routes->delete('Arsip/hapusASM/(:segment)', 'Arsip::hapusASM/$1');

$routes->get('User', 'User::index');
$routes->post('User/tambah', 'User::tambah');
$routes->post('User/edit/(:segment)', 'User::edit/$1');
$routes->delete('User/hapus/(:segment)', 'User::hapus/$1');
