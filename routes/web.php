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

Auth::routes();
 
Route::get('/home', function () {
                    if (Auth::user()->role==1) {
                      return redirect('/admin/home');
                    } else {
                      return redirect('/user/home');
                    }
                    
 })->name('home');
   

Route::group(['middleware' => ['user']], function () {
	Route::get('/user/home', 'HomeController@index')->name('user.home');
	Route::get('/partner/preference', 'HomeController@ShowPartnerPreference')->name('show.partner.preference');
	Route::post('/partner/preference/save', 'HomeController@SavePartnerPreference')->name('save.partner.preference');

}); 

Route::group(['middleware' => ['admin']], function () {
Route::get('/admin/home', 'HomeController@adminindex')->name('admin.home');
Route::get('/ajax-users', 'HomeController@ajax_all_users');
 Route::get('/admin/all-user-filter/{id?}', 'HomeController@filter_all_users');
 
 

});
