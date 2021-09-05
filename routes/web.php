<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('producto', 'App\Http\Controllers\ProductosController@index');
Route::get('producto/{id}', 'App\Http\Controllers\ProductosController@index');

Route::get('cliente', 'App\Http\Controllers\ClientesController@index');
Route::get('cliente/{id}', 'App\Http\Controllers\ClientesController@index');

Route::get('operacion', 'App\Http\Controllers\OperacionController@index');
Route::get('operacion/{id}', 'App\Http\Controllers\OperacionController@index');
Route::post('operacion', 'App\Http\Controllers\OperacionController@create');

Route::get('detalle', 'App\Http\Controllers\DetalleController@index');
Route::get('detalle/{id}', 'App\Http\Controllers\DetalleController@index');
Route::post('detalle', 'App\Http\Controllers\DetalleController@create');

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('productos')->name('productos/')->group(static function() {
            Route::get('/',                                             'ProductoController@index')->name('index');
            Route::get('/create',                                       'ProductoController@create')->name('create');
            Route::post('/',                                            'ProductoController@store')->name('store');
            Route::get('/{producto}/edit',                              'ProductoController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProductoController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{producto}',                                  'ProductoController@update')->name('update');
            Route::delete('/{producto}',                                'ProductoController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('clientes')->name('clientes/')->group(static function() {
            Route::get('/',                                             'ClienteController@index')->name('index');
            Route::get('/create',                                       'ClienteController@create')->name('create');
            Route::post('/',                                            'ClienteController@store')->name('store');
            Route::get('/{cliente}/edit',                               'ClienteController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ClienteController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{cliente}',                                   'ClienteController@update')->name('update');
            Route::delete('/{cliente}',                                 'ClienteController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('operacions')->name('operacions/')->group(static function() {
            Route::get('/',                                             'OperacionController@index')->name('index');
            Route::get('/create',                                       'OperacionController@create')->name('create');
            Route::post('/',                                            'OperacionController@store')->name('store');
            Route::get('/{operacion}/edit',                             'OperacionController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'OperacionController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{operacion}',                                 'OperacionController@update')->name('update');
            Route::delete('/{operacion}',                               'OperacionController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('detalles')->name('detalles/')->group(static function() {
            Route::get('/',                                             'DetalleController@index')->name('index');
            Route::get('/create',                                       'DetalleController@create')->name('create');
            Route::post('/',                                            'DetalleController@store')->name('store');
            Route::get('/{detalle}/edit',                               'DetalleController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DetalleController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{detalle}',                                   'DetalleController@update')->name('update');
            Route::delete('/{detalle}',                                 'DetalleController@destroy')->name('destroy');
        });
    });
});