<?php

use App\Http\Controllers\Admin\appointmentsController;
use App\Http\Controllers\Admin\blogsController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\doctorController;
use App\Http\Controllers\Admin\servicesController;
use App\Http\Controllers\Admin\SliderController;
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

Route::get('/','App\Http\Controllers\site\FrontendController@home')->name('/');
Route::get('serviceDetail/{id}','App\Http\Controllers\site\FrontendController@serviceDetail')->name('service.detail');
// Route::get('about', function () {
//     return view('site.about');
// })->name('about');
Route::get('department', 'App\Http\Controllers\site\FrontendController@service')->name('department');
Route::get('blog', 'App\Http\Controllers\site\FrontendController@blogs')->name('blog');
Route::get('blogDetail/{id}', 'App\Http\Controllers\site\FrontendController@blogDetail')->name('blog.detail');
Route::get('contact','App\Http\Controllers\site\FrontendController@contactDetail' )->name('contact');
Route::get('doctor','App\Http\Controllers\site\FrontendController@doc' )->name('doctors');
Route::get('doctorDetail/{id}','App\Http\Controllers\site\FrontendController@docDetail' )->name('doctor.detail');

Route::post('appointment/save','App\Http\Controllers\site\FrontendController@save')->name('appointments.save');
Route::any('sortDoc','App\Http\Controllers\site\FrontendController@getDepWiseDoc')->name('sortDoc');

Route::any('addFeedback','App\Http\Controllers\site\FrontendController@feedback')->name('feedback.add');


Auth::routes();
Route::group(['prefix'=>'admin'],function(){

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

//Admin Routes

// Route::resource('appointments',appointmentsController::class);
Route::get('appointments','App\Http\Controllers\Admin\appointmentsController@index')->name('appointments.index');

Route::resource('doctors',doctorController::class);
Route::post('doctors/update/{id}','App\Http\Controllers\Admin\doctorController@update')->name('doctors.update');

Route::resource('blogs',blogsController::class);
Route::post('blogs/update/{id}','App\Http\Controllers\Admin\blogsController@update')->name('blogs.update');

Route::resource('services',servicesController::class);
Route::post('services/update/{id}','App\Http\Controllers\Admin\servicesController@update')->name('services.update');

Route::resource('slider',SliderController::class);
Route::post('slider/update/{id}','App\Http\Controllers\Admin\SliderController@update')->name('slider.update');
Route::get('slider/delete/{id}','App\Http\Controllers\Admin\SliderController@destroy')->name('slider.delete');

Route::get('categories/index','App\Http\Controllers\Admin\categoryController@index')->name('categories.index');
Route::post('categories/store','App\Http\Controllers\Admin\categoryController@store')->name('categories.store');
Route::get('categories/delete/{id}','App\Http\Controllers\Admin\categoryController@destroy')->name('categories.destroy');

Route::get('miscellanous','App\Http\Controllers\Admin\siteController@index')->name('site.setting');
Route::post('siteSetting/save/{id}','App\Http\Controllers\Admin\siteController@store')->name('setting.save');

Route::get('feedback','App\Http\Controllers\Admin\feedbackController@index')->name('feedback.index');
Route::get('feedback/show/{id}','App\Http\Controllers\Admin\feedbackController@show')->name('feedback.show');

});

