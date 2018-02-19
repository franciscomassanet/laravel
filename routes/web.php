<?php

use Illuminate\Http\Request;
//use Google;
use Illuminate\Support\Facades\Auth;


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

Route::get('/insert', function () {
    return view('insert_course');
});

Route::get('classrooms', 'classroomController@index')->middleware('auth');
Route::resource('classrooms', 'classroomController')->middleware('auth');

Route::get('class/{id}/{name}', 'classes@index')->middleware('auth');
Route::resource('class_create', 'classroomCreate')->middleware('auth');

Route::get('oauth', ['as' => 'oauthCallback', 'uses' => 'classroomController@oauth']);




Route::get('signin', 'Auth\LoginController@redirectToProvider');
Route::get('auth/google/callback', 'Auth\LoginController@handleProviderCallback');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/teachers', 'admin@teachers')->middleware('auth');
Route::post('/add/teacher', 'admin@store')->middleware('auth');

Route::get('insert/{CourseID}/{CourseName}/{Results}/{Grade}/{Email}/{Duration}', 'insert@insert');

Route::get('/subjects', 'courses@subjects')->middleware('auth');
Route::get('/subject_area/{slug}', 'courses@courses')->middleware('auth');
Route::get('/lessons/{slug}/{course}', "contents@index")->middleware('auth');

Route::get('/myResults', 'myResults@results')->middleware('auth');
Route::get('/myClassrooms', 'myClasses@classes');

