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



//OTHER
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//CLUB
Route::get('/club-add', 'ClubController@index');
Route::post('/club-add', 'ClubController@store');

Route::get('/club-list', 'ClubController@listview');

Route::get('/club-edit/{id}', 'ClubController@edit');
Route::put('/club-edit/{id}', 'ClubController@update');

Route::delete('/club-delete/{id}', 'ClubController@destroy')->name('clubs.destroy');


//MEMBER
Route::get('/member-add', 'MemberController@index');
Route::post('/member-add', 'MemberController@store');

Route::get('/member-list', 'MemberController@listview');

Route::get('/member-edit/{id}', 'MemberController@edit');
Route::put('/member-edit/{id}', 'MemberController@update');

Route::delete('/member-delete/{id}', 'MemberController@destroy')->name('members.destroy');


//PAYMENTS
Route::get('/payment-add', 'PaymentController@index');
Route::get('/payment-add/{id}', 'PaymentController@showDue');
Route::post('/payment-add/{id}', 'PaymentController@store');

Route::get('/payment-list', 'PaymentController@listview');

Route::get('/payment-edit/{id}', 'PaymentController@edit');
Route::put('/payment-edit/{id}', 'PaymentController@update');

Route::delete('/payment-delete/{id}', 'PaymentController@destroy')->name('payments.destroy');


//ADMIN
Route::get('/admin-add', 'AdminController@index');


//REPORT
Route::get('/report-date', 'ReportController@date');
Route::get('/report-daily', 'ReportController@daily');

Route::get('/report-club', 'ReportController@club');
Route::get('/report-club/{id}', 'ReportController@specificClub');


//Route::get('/home', 'HomeController@listview');

