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

//testing routes








Route::get('/', function () {
    return view('welcome');
});

Route::get('/teacher', 'teacherAdd@index');
Route::get('/teacher/add', 'teacherAdd@teacherAdd');
Route::get('/log', 'Auth\login@handleProviderCallback');

Route::get('/newCourse', function () {
    return view('insert_course');
})->middleware('auth');

Route::get('classrooms', 'classroomController@index')->middleware('auth');
Route::resource('classrooms', 'classroomController')->middleware('auth');

Route::get('class/{id}/{name}', 'classes@index')->middleware('auth');

Route::get('oauth', ['as' => 'oauthCallback', 'uses' => 'classroomController@oauth']);




Route::get('signin', 'Auth\LoginController@redirectToProvider')->name(
    'signin');
Route::get('auth/google/callback', 'Auth\LoginController@handleProviderCallback');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::get('/teachers', 'admin@teachers')->middleware('auth');
Route::post('/add/teacher', 'admin@store')->middleware('auth');

Route::get('insert/{CourseID}/{CourseName}/{Results}/{Grade}/{Email}/{Duration}', 'insert@insert');

Route::get('/subjects', 'courses@subjects')->middleware('auth');
Route::get('/subject_area/{slug}', 'courses@courses')->middleware('auth');

Route::get('/launch_lessons/{slug}/{course}', "contents@launch")->middleware('auth');
Route::get('/lessons/{slug}/{course}', "contents@index");


Route::get('/myResults/', 'myResults@results')->middleware('auth');
Route::get('/studentResults/{email}', 'reports@student')->middleware('auth');
Route::get('/myClassrooms', 'myClasses@classes')->middleware('auth');

//Report Routes
Route::get('reports/overview', 'reports@overview')->middleware('auth');
Route::get('reports/student/{email}', 'reports@student')->middleware('auth');

//my Results Sorting
Route::get('/resultsOrderSubjectDesc', 'myResults@resultsBySubjectDesc')->middleware('auth');
Route::get('/resultsOrderSubject', 'myResults@resultsBySubject')->middleware('auth');
Route::get('/resultsOrderCourseDesc', 'myResults@resultsByCourseDesc')->middleware('auth');
Route::get('/resultsOrderCourse', 'myResults@resultsByCourse')->middleware('auth');
Route::get('/resultsOrderResultsDesc', 'myResults@resultsByResultsDesc')->middleware('auth');
Route::get('/resultsOrderResults', 'myResults@resultsByResults')->middleware('auth');
Route::get('/resultsOrderScoreDesc', 'myResults@resultsByScoreDesc')->middleware('auth');
Route::get('/resultsOrderScore', 'myResults@resultsByScore')->middleware('auth');
Route::get('/resultsOrderDurationDesc', 'myResults@resultsByDurationDesc')->middleware('auth');
Route::get('/resultsOrderDuration', 'myResults@resultsByDuration')->middleware('auth');
Route::get('/resultsOrderDateDesc', 'myResults@resultsByDateDesc')->middleware('auth');
Route::get('/resultsOrderDate', 'myResults@resultsByDate')->middleware('auth');

//Teacher view of students results Sorting
Route::get('/studentResultsOrderSubjectDesc/{email}', 'reports@resultsBySubjectDesc')->middleware('auth');
Route::get('/studentResultsOrderSubject/{email}', 'reports@resultsBySubject')->middleware('auth');
Route::get('/studentResultsOrderCourseDesc/{email}', 'reports@resultsByCourseDesc')->middleware('auth');
Route::get('/studentResultsOrderCourse/{email}', 'reports@resultsByCourse')->middleware('auth');
Route::get('/studentResultsOrderResultsDesc/{email}', 'reports@resultsByResultsDesc')->middleware('auth');
Route::get('/studentResultsOrderResults/{email}', 'reports@resultsByResults')->middleware('auth');
Route::get('/studentResultsOrderScoreDesc/{email}', 'reports@resultsByScoreDesc')->middleware('auth');
Route::get('/studentResultsOrderScore/{email}', 'reports@resultsByScore')->middleware('auth');
Route::get('/studentResultsOrderDurationDesc/{email}', 'reports@resultsByDurationDesc')->middleware('auth');
Route::get('/studentResultsOrderDuration/{email}', 'reports@resultsByDuration')->middleware('auth');
Route::get('/studentResultsOrderDateDesc/{email}', 'reports@resultsByDateDesc')->middleware('auth');
Route::get('/studentResultsOrderDate/{email}', 'reports@resultsByDate')->middleware('auth');



