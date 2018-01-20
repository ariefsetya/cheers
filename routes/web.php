<?php

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

Route::get('/undian', function () {
    return view('welcome');
})->name('undian');

Auth::routes();

// Route::get('/register', function () {
	// abort(404);
// });

Route::get('/', 'HomeController@index')->name('home');

Route::get('/data/undian', 'HomeController@data_undian')->name('data_undian');
Route::get('/data/undian/add', 'HomeController@data_undian_add')->name('data_undian_add');
Route::post('/data/undian/save', 'HomeController@data_undian_save')->name('data_undian_save');
Route::get('/data/undian/edit/{id}', 'HomeController@data_undian_edit')->name('data_undian_edit');
Route::post('/data/undian/update', 'HomeController@data_undian_update')->name('data_undian_update');
Route::get('/data/undian/delete/{id}', 'HomeController@data_undian_delete')->name('data_undian_delete');

Route::get('/data/peserta_undian', 'HomeController@data_peserta_undian')->name('data_peserta_undian');
Route::get('/data/peserta_undian/add', 'HomeController@data_peserta_undian_add')->name('data_peserta_undian_add');
Route::post('/data/peserta_undian/save', 'HomeController@data_peserta_undian_save')->name('data_peserta_undian_save');
Route::get('/data/peserta_undian/import', 'HomeController@data_peserta_undian_import')->name('data_peserta_undian_import');
Route::post('/data/peserta_undian/save_import', 'HomeController@data_peserta_undian_save_import')->name('data_peserta_undian_save_import');
Route::get('/data/peserta_undian/edit/{id}', 'HomeController@data_peserta_undian_edit')->name('data_peserta_undian_edit');
Route::post('/data/peserta_undian/update', 'HomeController@data_peserta_undian_update')->name('data_peserta_undian_update');
Route::get('/data/peserta_undian/delete/{id}', 'HomeController@data_peserta_undian_delete')->name('data_peserta_undian_delete');

Route::get('/pengaturan', 'HomeController@pengaturan')->name('pengaturan');
Route::get('/moderator', 'HomeController@moderator')->name('moderator');
Route::get('/report', 'HomeController@report')->name('report');
Route::get('/ajaxGetUndian', 'AjaxController@ajaxGetUndian')->name('ajaxGetUndian');
Route::get('/ajaxGetPesertaUndian/{id?}', 'AjaxController@ajaxGetPesertaUndian')->name('ajaxGetPesertaUndian');
Route::get('/ajaxGetRunningStatus/{id?}', 'AjaxController@ajaxGetRunningStatus')->name('ajaxGetRunningStatus');
Route::get('/ajaxStopRunningUndian/{id?}/{id_undian?}', 'AjaxController@ajaxStopRunningUndian')->name('ajaxStopRunningUndian');
Route::get('/ajaxGetDataUndian', 'AjaxController@ajaxGetDataUndian')->name('ajaxGetDataUndian');
Route::get('/ajaxStartUndian/{id?}', 'AjaxController@ajaxStartUndian')->name('ajaxStartUndian');
Route::get('/ajaxStopUndian/{id?}', 'AjaxController@ajaxStopUndian')->name('ajaxStopUndian');
Route::get('/ajaxWin/{id?}', 'AjaxController@ajaxWin')->name('ajaxWin');
Route::get('/ajaxLoss/{id?}', 'AjaxController@ajaxLoss')->name('ajaxLoss');