<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* ------------------------------- Clear cache ------------------------------ */
Route::get('/reset', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
/* ------------------------------------ o ----------------------------------- */

Route::get('/', [
    'uses'=>'BlogController@index',
    'as' => 'blog'
]);

Route::get('/blog/{post}', [
    'uses' => 'BlogController@show',
    'as' => 'blog.show'
]);

/*Route::get('/profil/{post}', [
    'uses' => 'ProfilController@show',
    'as' => 'profil.show'
]);*/

Route::post('/blog/{post}/comments', [
    'uses' => 'CommentsController@store',
    'as' => 'blog.comments'
]);

Route::get('/category/{category}', [
    'uses' => 'BlogController@category',
    'as'=> 'category'
]);


/*Route::get('kategorifoto', [
    'uses'=>'GaleriController@kategori',
    'as'=>'kategorifoto'
    ]);


Route::get('kategorifoto/{id}', [
    'uses'=>'GaleriController@foto',
    'as'=>'foto'
]);*/

Route::prefix('galeri')->group(function () {
    Route::name('galeri.')->group(function () {
        Route::get('kategorifoto', 'GaleriController@kategori')->name('kategorifoto');
        Route::get('foto/{id}', 'GaleriController@foto')->name('foto');
    });
});

Route::get('jadwaljumatan', [
    'uses'=>'JadwalController@jumatan',
    'as'=>'jadwaljumatan'
    ]);

Route::get('jadwalkajian', [
    'uses'=>'JadwalController@kajian',
    'as'=>'jadwalkajian'
]);



Route::get('/tag/{tag}', [
    'uses' => 'BlogController@tag',
    'as'=> 'tag'
]);

//Route::get('/home', 'HomeController@index');

/* ----------------------------- Route::auth(); ----------------------------- */
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
/* Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register'); */
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
/* ------------------------------------ o ----------------------------------- */
Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'Backend\HomeController@index')->name('home');

    Route::prefix('backend')->group(function () {
        Route::name('backend.')->group(function () {
            //Route::get('ckeditor', 'Backend\BlogController@ckeditor')->name('ckeditor');
            Route::group(['middleware' => ['role:superadmin|admin|pelak1']], function() {
                /* ---------------------------------- blog ---------------------------------- */
                Route::prefix('blog')->group(function () {
                    //Sama backend/blog/index
                    Route::name('blog.')->group(function () {
                        // Sama "backend.blog.index"
                        Route::get('index', 'Backend\BlogController@index')->name('index');
                        Route::get('create', 'Backend\BlogController@create')->name('create');
                        Route::post('store', 'Backend\BlogController@store')->name('store');
                        Route::get('edit/{id}', 'Backend\BlogController@edit')->name('edit');
                        Route::put('update/{id}', 'Backend\BlogController@update')->name('update');
                        Route::delete('destroy/{id}', 'Backend\BlogController@destroy')->name('destroy');
                    });
                });

                /* ---------------------------------- profil ---------------------------------- */
                Route::prefix('profil')->group(function () {
                    //Sama backend/profil/index
                    Route::name('profil.')->group(function () {
                        // Sama "backend.profil.index"
                        Route::get('index', 'Backend\ProfilController@index')->name('index');
                        Route::get('create', 'Backend\ProfilController@create')->name('create');
                        Route::post('store', 'Backend\ProfilController@store')->name('store');
                        Route::get('edit/{id}', 'Backend\ProfilController@edit')->name('edit');
                        Route::put('update/{id}', 'Backend\ProfilController@update')->name('update');
                        Route::delete('destroy/{id}', 'Backend\ProfilController@destroy')->name('destroy');
                    });
                });

                /* ---------------------------------- jadwal jumatan ---------------------------------- */
                Route::prefix('jadwaljumatan')->group(function () {
                    Route::name('jadwaljumatan.')->group(function () {
                        Route::get('index', 'Backend\JadwaljumatController@index')->name('index');
                        Route::get('create', 'Backend\JadwaljumatController@create')->name('create');
                        Route::post('store', 'Backend\JadwaljumatController@store')->name('store');
                        Route::get('edit/{id}', 'Backend\JadwaljumatController@edit')->name('edit');
                        Route::put('update/{id}', 'Backend\JadwaljumatController@update')->name('update');
                        Route::delete('destroy/{id}', 'Backend\JadwaljumatController@destroy')->name('destroy');
                    });
                });

                /* ---------------------------------- jadwal kajian---------------------------------- */
                Route::prefix('jadwalkajian')->group(function () {
                    Route::name('jadwalkajian.')->group(function () {
                        Route::get('index', 'Backend\JadwalkajianController@index')->name('index');
                        Route::get('create', 'Backend\JadwalkajianController@create')->name('create');
                        Route::post('store', 'Backend\JadwalkajianController@store')->name('store');
                        Route::get('edit/{id}', 'Backend\JadwalkajianController@edit')->name('edit');
                        Route::put('update/{id}', 'Backend\JadwalkajianController@update')->name('update');
                        Route::delete('destroy/{id}', 'Backend\JadwalkajianController@destroy')->name('destroy');
                    });
                });


                /* ------------------------------- categories ------------------------------- */
                Route::prefix('categories')->group(function () {
                    Route::name('categories.')->group(function () {
                        Route::get('/', 'Backend\CategoriesController@index')->name('index');
                        Route::get('create', 'Backend\CategoriesController@create')->name('create');
                        Route::post('store', 'Backend\CategoriesController@store')->name('store');
                        Route::get('edit/{id}', 'Backend\CategoriesController@edit')->name('edit');
                        Route::put('update/{id}', 'Backend\CategoriesController@update')->name('update');
                        Route::delete('destroy/{id}', 'Backend\CategoriesController@destroy')->name('destroy');
                    });
                });

                /* ------------------------------- image categories ------------------------------- */
                Route::prefix('kategorigaleri')->group(function () {
                    Route::name('kategorigaleri.')->group(function () {
                        Route::get('/', 'Backend\ImagecategoriesController@index')->name('index');
                        Route::get('create', 'Backend\ImagecategoriesController@create')->name('create');
                        Route::post('store', 'Backend\ImagecategoriesController@store')->name('store');
                        Route::get('edit/{id}', 'Backend\ImagecategoriesController@edit')->name('edit');
                        Route::put('update/{id}', 'Backend\ImagecategoriesController@update')->name('update');
                        Route::delete('destroy/{id}', 'Backend\ImagecategoriesController@destroy')->name('destroy');
                    });
                });

            });

            /* ---------------------------------- galeri ---------------------------------- */
            Route::prefix('galeri')->group(function () {
                Route::name('galeri.')->group(function () {
                    Route::get('index', 'Backend\ImageController@index')->name('index');
                    Route::get('create', 'Backend\ImageController@create')->name('create');
                    Route::post('store', 'Backend\ImageController@store')->name('store');
                    Route::get('edit/{id}', 'Backend\ImageController@edit')->name('edit');
                    Route::put('update/{id}', 'Backend\ImageController@update')->name('update');
                    Route::delete('destroy/{id}', 'Backend\ImageController@destroy')->name('destroy');
                });
            });


            /* ---------------------------------- video ---------------------------------- */
            Route::prefix('video')->group(function () {
                Route::name('video.')->group(function () {
                    Route::get('index', 'Backend\VideoController@index')->name('index');
                    Route::get('create', 'Backend\VideoController@create')->name('create');
                    Route::post('store', 'Backend\VideoController@store')->name('store');
                    Route::get('edit/{id}', 'Backend\VideoController@edit')->name('edit');
                    Route::put('update/{id}', 'Backend\VideoController@update')->name('update');
                    Route::delete('destroy/{id}', 'Backend\VideoController@destroy')->name('destroy');
                });
            });



            Route::group(['middleware' => ['role:superadmin|admin']], function() {
                /* ---------------------------------- user ---------------------------------- */
                Route::prefix('users')->group(function () {
                    Route::name('users.')->group(function () {
                        Route::get('/', 'Backend\UsersController@index')->name('index');
                        Route::get('create', 'Backend\UsersController@create')->name('create');
                        Route::post('store', 'Backend\UsersController@store')->name('store');
                        Route::get('edit/{id}', 'Backend\UsersController@edit')->name('edit');
                        Route::put('update/{id}', 'Backend\UsersController@update')->name('update');
                        Route::delete('destroy/{id}', 'Backend\UsersController@destroy')->name('destroy');
                    });
                });

                /* --------------------------- ketegori transaksi --------------------------- */
                // Route::prefix('kategori-transaksi')->group(function () {
                //     Route::name('kategori-transaksi.')->group(function () {
                //         Route::get('/', 'KeuanganController@kategori')->name('index');
                //         Route::get('tambah', 'KeuanganController@kategori_tambah')->name('tambah');
                //         Route::post('aksi', 'KeuanganController@kategori_aksi')->name('aksi');
                //         Route::get('edit/{id}', 'KeuanganController@kategori_edit')->name('edit');
                //         Route::put('update/{id}', 'KeuanganController@kategori_update')->name('update');
                //         Route::delete('hapus/{id}', 'KeuanganController@kategori_hapus')->name('hapus');
                //     });
                // });
            });

            Route::group(['middleware' => ['role:superadmin|admin|pelak2']], function() {
                /* --------------------------------- laporan -------------------------------- */
                Route::prefix('laporan')->group(function () {
                    Route::name('laporan.')->group(function () {
                        Route::get('/', 'KeuanganController@cetaklaporan')->name('index');
                        Route::get('search', 'KeuanganController@cetaklaporan_hasil')->name('search');
                        Route::get('pdf', 'KeuanganController@cetaklaporan_pdf')->name('pdf');
                        Route::get('excel', 'KeuanganController@cetaklaporan_excel')->name('excel');
                    });
                });

                /* -------------------------------- transaksi ------------------------------- */
                // Route::prefix('transaksi')->group(function () {
                //     Route::name('transaksi.')->group(function () {
                //         Route::get('/', 'KeuanganController@transaksi')->name('index');
                //         Route::get('tambah', 'KeuanganController@transaksi_tambah')->name('tambah');
                //         Route::post('aksi', 'KeuanganController@transaksi_aksi')->name('aksi');
                //         Route::get('edit/{id}', 'KeuanganController@transaksi_edit')->name('edit');
                //         Route::put('update/{id}', 'KeuanganController@transaksi_update')->name('update');
                //         Route::delete('hapus/{id}', 'KeuanganController@transaksi_hapus')->name('hapus');
                //         Route::get('cari', 'KeuanganController@transaksi_cari')->name('hapus');
                //         Route::get('rangkuman', 'KeuanganController@rangkuman_transaksi')->name('rangkuman');
                //     });
                // });
            });
        });
    });

    /* --------------------- new route for laporan keuangan --------------------- */

    /* Route::resource('/backend/kategoritransaksi', 'Backend\KategoritransController');
    Route::resource('/backend/transaksi', 'Backend\TransaksiController');
    Route::resource('/backend/cetaklaporan', 'Backend\CetakController'); */

    /* ------------------------------------ o ----------------------------------- */


    /* -------------------------------------------------------------------------- */
    /*                                 UNARRANGED                                 */
    /* -------------------------------------------------------------------------- */
    Route::group(['middleware' => ['role:superadmin|admin']], function() {
        //old route for laporan keuangan
        Route::get('/kategoritransaksi', 'KeuanganController@kategori');
        Route::get('/kategoritransaksi/tambah', 'KeuanganController@kategori_tambah');
        Route::post('/kategoritransaksi/aksi', 'KeuanganController@kategori_aksi');
        Route::get('/kategoritransaksi/edit/{id}', 'KeuanganController@kategori_edit');
        Route::put('/kategoritransaksi/update/{id}', 'KeuanganController@kategori_update');
        Route::get('/kategoritransaksi/hapus/{id}', 'KeuanganController@kategori_hapus');
    });

    Route::group(['middleware' => ['role:superadmin|admin|pelak2']], function() {
        Route::get('/transaksi', 'KeuanganController@transaksi');
        Route::get('/transaksi/tambah', 'KeuanganController@transaksi_tambah');
        Route::post('/transaksi/aksi', [
            'uses' => 'KeuanganController@transaksi_aksi',
            'as' => 'blog.kategorikeuangan.aksi']);
        Route::get('/transaksi/edit/{id}', 'KeuanganController@transaksi_edit');
        Route::put('/transaksi/update/{id}', 'KeuanganController@transaksi_update');
        Route::get('/transaksi/hapus/{id}', 'KeuanganController@transaksi_hapus');
        Route::get('/transaksi/cari', 'KeuanganController@transaksi_cari');
        Route::get('/rangkumantransaksi', 'KeuanganController@rangkuman_transaksi');
        // Route::get('/cetaklaporan', 'KeuanganController@cetaklaporan');
        // Route::get('/cetaklaporan/hasil', 'KeuanganController@cetaklaporan_hasil');
        // Route::get('/cetaklaporan/print', 'KeuanganController@cetaklaporan_print');
    });
});


Route::get('/profil/{id}', 'ProfilController@profil')->name('profil');
//Route::get('/gallery', 'BlogController@gallery')->name('gallery');



/*Route::get('/gallery/foto', [
    'uses' => 'BlogController@foto',
    'as' => 'blog.foto'
]);*/

//Route::get('/foto', 'BlogController@foto')->name('foto');
Route::get('/video', 'BlogController@video')->name('video');



Route::prefix('keuangan')->group(function () {
    Route::name('keuangan.')->group(function () {
        Route::get('/', 'BlogController@keuangan')->name('index');
        Route::get('search', 'BlogController@keuangan_hasil')->name('search');
    });
});


Route::get('/video', 'BlogController@video')->name('video');
