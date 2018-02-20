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

Route::get('/newCourse', function () {
    return view('insert_course');
});

Route::get('classrooms', 'classroomController@index')->middleware('auth');
Route::resource('classrooms', 'classroomController')->middleware('auth');

Route::get('class/{id}/{name}', 'classes@index')->middleware('auth');

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


Route::get('/myResults/', 'myResults@results')->middleware('auth');
Route::get('/studentResults/{email}', 'studentResults@results')->middleware('auth');
Route::get('/myClassrooms', 'myClasses@classes');

//my Results Sorting
Route::get('/resultsOrderSubjectDesc', 'myResults@resultsBySubjectDesc');
Route::get('/resultsOrderSubject', 'myResults@resultsBySubject');
Route::get('/resultsOrderCourseDesc', 'myResults@resultsByCourseDesc');
Route::get('/resultsOrderCourse', 'myResults@resultsByCourse');
Route::get('/resultsOrderResultsDesc', 'myResults@resultsByResultsDesc');
Route::get('/resultsOrderResults', 'myResults@resultsByResults');
Route::get('/resultsOrderScoreDesc', 'myResults@resultsByScoreDesc');
Route::get('/resultsOrderScore', 'myResults@resultsByScore');
Route::get('/resultsOrderDurationDesc', 'myResults@resultsByDurationDesc');
Route::get('/resultsOrderDuration', 'myResults@resultsByDuration');
Route::get('/resultsOrderDateDesc', 'myResults@resultsByDateDesc');
Route::get('/resultsOrderDate', 'myResults@resultsByDate');

//Teacher view of students results Sorting
Route::get('/studentResultsOrderSubjectDesc/{email}', 'studentResults@resultsBySubjectDesc');
Route::get('/studentResultsOrderSubject/{email}', 'studentResults@resultsBySubject');
Route::get('/studentResultsOrderCourseDesc/{email}', 'studentResults@resultsByCourseDesc');
Route::get('/studentResultsOrderCourse/{email}', 'studentResults@resultsByCourse');
Route::get('/studentResultsOrderResultsDesc/{email}', 'studentResults@resultsByResultsDesc');
Route::get('/studentResultsOrderResults/{email}', 'studentResults@resultsByResults');
Route::get('/studentResultsOrderScoreDesc/{email}', 'studentResults@resultsByScoreDesc');
Route::get('/studentResultsOrderScore/{email}', 'studentResults@resultsByScore');
Route::get('/studentResultsOrderDurationDesc/{e
mail}', 'studentResults@resultsByDurationDesc');
Route::get('/studentResultsOrderDuration/{email}', 'studentResults@resultsByDuration');
Route::get('/studentResultsOrderDateDesc/{email}', 'studentResults@resultsByDateDesc');
Route::get('/studentResultsOrderDate/{email}', 'studentResults@resultsByDate');



