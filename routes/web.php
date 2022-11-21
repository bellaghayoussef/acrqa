<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountriesController;
use App\Models\countries;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StampsController;

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

    return redirect()->route('login');

});

Auth::routes();
Route::post('/logins', [App\Http\Controllers\Auth\LoginController::class, 'logins'])->name('logins');
Route::get('/confirme', [App\Http\Controllers\Auth\LoginController::class, 'confirme'])->name('confirme');



Route::group([

    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setlocale'], function() {




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

   Route::get('/profil', [UsersController::class, 'profil'])
         ->name('profil');
Route::put('/signature', [UsersController::class, 'signature'])
         ->name('signature');

Route::group([
    'prefix' => 'users',
], function () {
    Route::get('/', [UsersController::class, 'index'])
         ->name('users.user.index');
    Route::get('/create', [UsersController::class, 'create'])
         ->name('users.user.create');
    Route::get('/show/{user}',[UsersController::class, 'show'])
         ->name('users.user.show');
    Route::get('/{user}/edit',[UsersController::class, 'edit'])
         ->name('users.user.edit');
    Route::post('/', [UsersController::class, 'store'])
         ->name('users.user.store');
    Route::put('user/{user}', [UsersController::class, 'update'])
         ->name('users.user.update');
    Route::delete('/user/{user}',[UsersController::class, 'destroy'])
         ->name('users.user.destroy');
    Route::get('/storeadmin', [UsersController::class, 'storeadmin'])
         ->name('storeadmin');


});

Route::group([
    'prefix' => 'stamps',
], function () {
    Route::get('/', [StampsController::class, 'index'])
         ->name('stamps.stamp.index');
    Route::get('/create', [StampsController::class, 'create'])
         ->name('stamps.stamp.create');
    Route::get('/show/{stamp}',[StampsController::class, 'show'])
         ->name('stamps.stamp.show')->where('id', '[0-9]+');
    Route::get('/{stamp}/edit',[StampsController::class, 'edit'])
         ->name('stamps.stamp.edit')->where('id', '[0-9]+');
    Route::post('/', [StampsController::class, 'store'])
         ->name('stamps.stamp.store');
    Route::put('stamp/{stamp}', [StampsController::class, 'update'])
         ->name('stamps.stamp.update')->where('id', '[0-9]+');
    Route::delete('/stamp/{stamp}',[StampsController::class, 'destroy'])
         ->name('stamps.stamp.destroy')->where('id', '[0-9]+');
});

});

Route::group([
    'prefix' => 'countries',
], function () {
    Route::get('/', [CountriesController::class, 'index'])
         ->name('countries.countries.index');
    Route::get('/create', [CountriesController::class, 'create'])
         ->name('countries.countries.create');
    Route::get('/show/{countries}',[CountriesController::class, 'show'])
         ->name('countries.countries.show');
    Route::get('/{countries}/edit',[CountriesController::class, 'edit'])
         ->name('countries.countries.edit');
    Route::post('/', [CountriesController::class, 'store'])
         ->name('countries.countries.store');
    Route::put('countries/{countries}', [CountriesController::class, 'update'])
         ->name('countries.countries.update');
    Route::delete('/countries/{countries}',[CountriesController::class, 'destroy'])
         ->name('countries.countries.destroy');

          Route::get('countriesup', 'App\Http\Controllers\CountriesController@update')
         ->name('countriesup');
});


