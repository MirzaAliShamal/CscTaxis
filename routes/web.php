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

require __DIR__.'/auth.php';


Route::get('/', 'HomeController@home')->name('home');
Route::get('/private-tours', 'HomeController@privateTours')->name('private.tours');
Route::get('/everyday-taxi', 'HomeController@everydayTaxi')->name('everyday.taxi');
Route::get('/airport-transport', 'HomeController@airportTransport')->name('airport.transport');
Route::get('/cruise-transport', 'HomeController@cruiseTransport')->name('cruise.transport');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/get-a-quote', 'HomeController@getAQuote')->name('get.quote');
Route::post('/book', 'HomeController@booking')->name('book');
Route::get('/thankyou', 'HomeController@thankYou')->name('thankyou');
Route::get('/payment', 'HomeController@payment')->name('payment');
Route::post('/payment-save', 'HomeController@paymentSave')->name('payment.save');
Route::post('/contact-save', 'HomeController@contactSave')->name('contact.save');


// Admin Unathenticated Routes
Route::get('admin/login', 'Auth\AuthenticatedSessionController@showAdminLoginForm')->name('admin.login');

Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('auth', 'admin')->group(function() {
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('profile', 'DashboardController@profile')->name('profile');
    Route::get('enquiries', 'DashboardController@enquiries')->name('enquiries');
    Route::post('general-update', 'DashboardController@generalUpdate')->name('general.update');
    Route::post('pass-update', 'DashboardController@passUpdate')->name('pass.update');
    Route::get('settings', 'SettingController@settings')->name('setting');
    Route::post('setting-save', 'SettingController@save')->name('setting.save');

    Route::get('transaction', 'DashboardController@transaction')->name('transaction');

    Route::prefix('terminal')->name('terminal.')->group(function() {
    	Route::get('list', 'TerminalController@list')->name('list');
    	Route::get('add', 'TerminalController@add')->name('add');
    	Route::post('save/{id?}', 'TerminalController@save')->name('save');
    	Route::get('edit/{id?}', 'TerminalController@edit')->name('edit');
    	Route::get('delete/{id?}', 'TerminalController@delete')->name('delete');

        Route::get('bulk-action', 'TerminalController@bulkAction')->name('bulk.action');
	});

    Route::prefix('faq')->name('faq.')->group(function() {
    	Route::get('list', 'FaqController@list')->name('list');
    	Route::get('add', 'FaqController@add')->name('add');
    	Route::post('save/{id?}', 'FaqController@save')->name('save');
    	Route::get('edit/{id?}', 'FaqController@edit')->name('edit');
    	Route::get('delete/{id?}', 'FaqController@delete')->name('delete');

    	Route::get('status-change/{id?}', 'FaqController@statusChange')->name('status.change');
        Route::get('bulk-action', 'FaqController@bulkAction')->name('bulk.action');
	});

    Route::prefix('booking')->name('booking.')->group(function() {
    	Route::get('list/{status?}', 'BookingController@list')->name('list');
        Route::get('detail/{id?}', 'BookingController@detail')->name('detail');

        Route::get('status-change/{id?}/{action?}', 'BookingController@statusChange')->name('status.change');
    });

    Route::prefix('cms')->name('cms.')->group(function() {
        Route::get('home-page', 'SettingController@homePage')->name('home.page');
        Route::get('private-tours', 'SettingController@privateTours')->name('private.tours');
        Route::get('everyday-taxi', 'SettingController@everydayTaxi')->name('everyday.taxi');
        Route::get('airport-transport', 'SettingController@airportTransport')->name('airport.transport');
        Route::get('cruise-transport', 'SettingController@cruiseTransport')->name('cruise.transport');
    });
});
