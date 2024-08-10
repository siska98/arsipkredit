<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\KreditController;
use App\Http\Controllers\DetailController;

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

Route::middleware(['web'])->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/', 'DashboardController@index')->name('/');
    });
});

Route::get('/pinjaman/{id}', 'DetailController@showDetail')->name('detail');
Route::get('/tambah-kur', 'KreditController@create')->name('tambah-kur');
Route::post('/simpan-kur', 'KreditController@store')->name('simpan-kur');
Route::get('/tambah-kpr', 'KreditController@createkpr')->name('tambah-kpr');
Route::post('/simpan-kpr', 'KreditController@storekpr')->name('simpan-kpr');
Route::get('/tambah-kendaraan', 'KreditController@createkendaraan')->name('tambah-kendaraan');
Route::post('/simpan-kendaraan', 'KreditController@storekendaraan')->name('simpan-kendaraan');
Route::get('/tambah-multiguna', 'KreditController@createmultiguna')->name('tambah-multiguna');
Route::post('/simpan-multiguna', 'KreditController@storemultiguna')->name('simpan-multiguna');
Route::get('/tambah-investasi', 'KreditController@createinvestasi')->name('tambah-investasi');
Route::post('/simpan-investasi', 'KreditController@storeinvestasi')->name('simpan-investasi');
Route::get('/tambah-pendidikan', 'KreditController@creatependidikan')->name('tambah-pendidikan');
Route::post('/simpan-pendidikan', 'KreditController@storependidikan')->name('simpan-pendidikan');
Route::get('/tambah-kta', 'KreditController@createkta')->name('tambah-kta');
Route::post('/simpan-kta', 'KreditController@storekta')->name('simpan-kta');

Route::group(['prefix' => 'pinjaman'], function () {
    Route::get('/', 'PinjamanController@index')->name('pinjaman.index');
    Route::delete('/{id_pinjaman}', 'PinjamanController@destroy')->name('pinjaman.destroy');
    Route::get('/detail/{id_pinjaman}', 'DetailController@showDetail')->name('pinjaman.detail');
    Route::post('/detail/{id_pinjaman}/finished', 'DetailController@markAsFinished')->name('markAsFinished');
    Route::get('/detailinvestasi/{id_pinjaman}', 'DetailController@showDetailInvestasi')->name('pinjaman.detailinvestasi');
    Route::post('/detailinvestasi/{id_pinjaman}/finished', 'DetailController@markAsFinished1')->name('markAsFinished1');
    Route::get('/detailkendaraan/{id_pinjaman}', 'DetailController@showDetailKendaraan')->name('pinjaman.detailkendaraan');
    Route::post('/detailkendaraan/{id_pinjaman}/finished', 'DetailController@markAsFinished2')->name('markAsFinished2');
    Route::get('/detailkpr/{id_pinjaman}', 'DetailController@showDetailKpr')->name('pinjaman.detailkpr');
    Route::post('/detailkpr/{id_pinjaman}/finished', 'DetailController@markAsFinished3')->name('markAsFinished3');
    Route::get('/detailkta/{id_pinjaman}', 'DetailController@showDetailKta')->name('pinjaman.detailkta');
    Route::post('/detailkta/{id_pinjaman}/finished', 'DetailController@markAsFinished4')->name('markAsFinished4');
    Route::get('/detailmultiguna/{id_pinjaman}', 'DetailController@showDetailMultiguna')->name('pinjaman.detailmultiguna');
    Route::post('/detailmultiguna/{id_pinjaman}/finished', 'DetailController@markAsFinished5')->name('markAsFinished5');
    Route::get('/detailpendidikan/{id_pinjaman}', 'DetailController@showDetailPendidikan')->name('pinjaman.detailpendidikan');
    Route::post('/detailpendidikan/{id_pinjaman}/finished', 'DetailController@markAsFinished6')->name('markAsFinished6');

});
Route::group(['prefix' => 'selesai'], function () {
    Route::get('/', 'PinjamanController@selesai')->name('pinjaman.selesai');
});

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@loginAksi')->name('login.aksi');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::get('/input', function () {
    return view('pages.input.input');
})->name('input');
// Route::get('/','DashboardController@index');



Route::group(['prefix' => 'error-pages'], function(){
    Route::get('error-404', function () { return view('pages.error-pages.error-404'); });
    Route::get('error-500', function () { return view('pages.error-pages.error-500'); });
});

// For Clear cache
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}',function(){
    return View::make('pages.error-pages.error-404');
})->where('page','.*');