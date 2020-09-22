<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'uses'=>'BlogController@index',
    'as' => 'blog'
]);

Route::get('/blog/{post}', [
    'uses' => 'BlogController@show',
    'as' => 'blog.show'
]);

Route::post('/blog/{post}/comments', [
    'uses' => 'CommentsController@store',
    'as' => 'blog.comments'
]);

Route::get('/category/{category}', [
    'uses' => 'BlogController@category',
    'as'=> 'category'
]);

Route::get('/tag/{tag}', [
    'uses' => 'BlogController@tag',
    'as'=> 'tag'
]);

Route::auth();

//Route::get('/home', 'HomeController@index');

Route::get('/home', 'Backend\HomeController@index');

Route::resource('/backend/blog', 'Backend\BlogController');

Route::resource('/backend/categories', 'Backend\CategoriesController');

Route::resource('/backend/users', 'Backend\UsersController');

Route::get('/profil', 'BlogController@profil');

Route::get('/gallery', 'BlogController@gallery');

Route::get('/video', 'BlogController@video');

Route::get('/keuangan', 'BlogController@keuangan');

//new route for laporan keuangan

/*Route::resource('/backend/kategoritransaksi', 'Backend\KategoritransController');

Route::resource('/backend/transaksi', 'Backend\TransaksiController');

Route::resource('/backend/cetaklaporan', 'Backend\CetakController');*/

/*******************************************************************/



//old route for laporan keuangan
Route::get('/kategoritransaksi', 'KeuanganController@kategori');
Route::get('/kategoritransaksi/tambah', 'KeuanganController@kategori_tambah');
Route::post('/kategoritransaksi/aksi', 'KeuanganController@kategori_aksi');
Route::get('/kategoritransaksi/edit/{id}', 'KeuanganController@kategori_edit');
Route::put('/kategoritransaksi/update/{id}', 'KeuanganController@kategori_update');
Route::get('/kategoritransaksi/hapus/{id}', 'KeuanganController@kategori_hapus');

Route::get('/transaksi', 'KeuanganController@transaksi');
Route::get('/transaksi/tambah', 'KeuanganController@transaksi_tambah');

Route::post('/transaksi/aksi', [
    'uses' => 'KeuanganController@transaksi_aksi',
    'as' => 'blog.kategorikeuangan.aksi']);

Route::get('/transaksi/edit/{id}', 'KeuanganController@transaksi_edit');
Route::put('/transaksi/update/{id}', 'KeuanganController@transaksi_update');
Route::get('/transaksi/hapus/{id}', 'KeuanganController@transaksi_hapus');
Route::get('/transaksi/cari', 'KeuanganController@transaksi_cari');

Route::get('/cetaklaporan', 'KeuanganController@cetaklaporan');
Route::get('/cetaklaporan/hasil', 'KeuanganController@cetaklaporan_hasil');
Route::get('/cetaklaporan/print', 'KeuanganController@cetaklaporan_print');

Route::get('/cetaklaporan/excel', 'KeuanganController@cetaklaporan_excel');

Route::get('/rangkumantransaksi', 'KeuanganController@rangkuman_transaksi');