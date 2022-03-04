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

// Route::get('/', function () {
//     return view('default');
// })->middleware('auth')->name('mainroute');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
//laporan polisi
Route::get('laporanpolisi/','LaporanPolisiController@index');
Route::get('laporanpolisi/form/','LaporanPolisiController@form');
Route::get('laporanpolisi/{id}/ubah', 'LaporanPolisiController@editForm');
Route::get('laporanpolisi/{id}/edit', 'LaporanPolisiController@getDataLp');
Route::post('laporanpolisi/','LaporanPolisiController@store');
Route::post('laporanpolisi/update', 'LaporanPolisiController@update');
Route::post('laporanpolisi/updatestatus', 'LaporanPolisiController@updatestatus');
Route::post('laporanpolisi/getListData','LaporanPolisiController@getBasicData');
Route::delete('laporanpolisi', 'LaporanPolisiController@delete');
//pelapor
Route::post('pelapor', 'PelaporController@store');
Route::post('pelapor/update', 'PelaporController@update');
Route::get('pelapor/{id}/edit', 'PelaporController@getDataPelapor');
//Barang Bukti
Route::post('barangbukti', 'BarangBuktiController@store');
Route::post('barangbukti/update', 'BarangBuktiController@update');
Route::get('barangbukti/{id}/edit', 'BarangBuktiController@getData');
Route::get('barangbukti/{id}/list', 'BarangBuktiController@getDataList');
Route::delete('barangbukti', 'BarangBuktiController@delete');
//Grafik & Peta
Route::get('grafik/petasebaran','GrafikController@PetaSebaran');
Route::get('grafik/datawilayah','GrafikController@getWilayah');
Route::get('grafik/jumlahlp','GrafikController@GrafikJumlahLP');
Route::get('grafik/getRekapJumlahLp','GrafikController@getRekapJumlahLp');
Route::get('grafik/petasebaran/data','GrafikController@PetaSebaranData');
//search
Route::get('search','SearchController@Search');
Route::get('search/detail','SearchController@Detail');
Route::get('search/list', 'SearchController@getData');
Route::get('search/{id}/exportpdf', 'SearchController@ExportPdf');
//dashboards
Route::get('dashboard/lpharian','HomeController@getJumlahLpHarian');
Route::get('dashboard/lpstatus', 'HomeController@getJumlahLpStatus');
Route::get('dashboard/lpbulan', 'HomeController@getJumlahLpByBulan');
Route::get('dashboard/lpharianuser','HomeController@getJumlahLpHarianUser');
Route::get('dashboard/listlpdashboarduser','HomeController@getListLpforDashboardUser');
//pengguna
Route::get('pengguna/','PenggunaController@index');
Route::get('pengguna/{id}', 'PenggunaController@getUserData');
Route::post('pengguna/update', 'PenggunaController@update');
Route::post('pengguna/getListData','PenggunaController@getBasicData');
Route::post('pengguna/', 'PenggunaController@store');
Route::get('roles/','PenggunaController@getRoles');
Route::get('satker/','PenggunaController@getSatker');
//check
Route::get('check/','BarangBuktiCheckController@index');
Route::post('check/list', 'BarangBuktiCheckController@getData');
Route::post('check/updatestatus', 'BarangBuktiCheckController@updatestatus');

Route::group(['middleware' => 'guest'], function () {
    Route::post('laporanpolisi/listbb','PublicController@getListBb');
});