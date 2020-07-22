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

/* Route::get('/', function () {
    return view('auth.login');
}); */

/* Route::resource('contacts','ContactFormController')->only([
    
]); */

//Route::get('/shinsei', 'ContactFormController@create')->name('shinsei.create');

//Route::get('/hokoku', 'hokokuController@index')->name('hokoku');


Route::group(['prefix' => 'contact', 'middleware' => 'auth'], function(){

    Route::get('rireki', 'HomeController@show')->name('rireki.show');
    Route::get('home', 'ContactFormController@index')->name('businessTripHome.index');
    Route::get('shinsei', 'ContactFormController@create')->name('shinsei.create');
    Route::get('hokokuHome', 'hokokuController@index')->name('hokoku.index');
    Route::get('hokoku/{id}', 'hokokuController@create')->name('hokoku.create');
    Route::post('hokokuStore', 'hokokuController@store')->name('hokoku.store');

    Route::post('flgset/{id}', 'hokokuController@flgset')->name('hokoku.flgset');

    Route::post('store', 'ContactFormController@store')->name('shinsei.store');
    Route::get('show/{id}', 'ContactFormController@show')->name('contact.show');
    Route::get('edit/{id}', 'ContactFormController@edit')->name('contact.edit');
    Route::get('update/{id}', 'ContactFormController@update')->name('contact.update');
    Route::post('update/{id}', 'ContactFormController@update')->name('contact.update');
    Route::post('destroy/{id}', 'ContactFormController@destroy')->name('contact.destroy');

    Route::get('returnHome', function () {
        return view('businessTripHome');
    });



});



Auth::routes();



