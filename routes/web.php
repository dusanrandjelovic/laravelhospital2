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

Route::get('/', function () {
    return view('pocetna');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/asistent', 'AsistentController@index')->name('asistent')->middleware('asistent');
Route::get('/lekar', 'LekarController@index')->name('lekar')->middleware('lekar');
Route::get('/tester', 'TesterController@index')->name('tester')->middleware('tester');

Route::resource('roles', 'RoleController')->middleware('admin');
Route::resource('users', 'UserController')->middleware('admin');
Route::resource('pacijenti', 'PacijentController')->middleware('asistent');
Route::resource('lekovi', 'LekController')->middleware('asistent');
Route::resource('kartoni', 'KartonController')->middleware('lekar');
Route::resource('dijagnoze', 'DijagnozaController')->middleware('asistent');

Route::resource('asistentkartoni', 'AsistentController')->middleware('asistent');
Route::resource('doktorpacijenti', 'LekarController')->middleware('lekar');

Route::get('/kartoni', 'AsistentController@sviKartoni');
Route::get('/kartoni/create', 'AsistentController@create');
Route::post('/kartoni/submit', 'AsistentController@store');

//admin
//Route::get('/admin', 'AdminController@index')->name('admin.dashboard'); // imenovanje rute
//Route::get('/management/login', 'Auth\ManagementLoginController@showLoginForm')->name('management.login');
//Route::post('/management/login', 'Auth\ManagementLoginController@redirectTo')->name('management.login.submit');
Route::get('/management/register', 'Auth\ManagementRegisterController@showRegistrationForm')->name('management.register')->middleware('admin');
Route::post('/management/register', 'Auth\ManagementRegisterController@createManagement')->name('management.register.submit');


Route::get('/roles', 'RoleController@index')->name('role.index')->middleware('admin');

Route::get('/searchuser', 'AdminController@searchUser');
Route::get('/searchdoktorovpacijent', 'LekarController@searchPacijent');
Route::get('/searchpacijent', 'PacijentController@searchPacijent');
Route::get('/searchdijagnoza', 'DijagnozaController@searchDijagnoza');
Route::get('/searchlek', 'AsistentController@searchLek');
Route::get('/searchkarton', 'AsistentController@searchKarton');
Route::get('/searchpacijentkarton', 'AsistentController@searchPacijentKarton');

Route::post('/pacijenti/submit', 'PacijentController@store');
