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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/report', 'admin\\reportController1@index')->name('report');
Route::get('/reportapprove', 'admin\\reportController1@reportapprove')->name('reportapprove');

//Route::get('/createWord', ['as'=>'createWord','uses'=>'Admin\\gradeController@createWordDocx']);



Route::resource('admin/grade', 'Admin\\gradeController');
Route::resource('admin/grade1', 'Admin\\gradeController1');

Route::get('/admin/create1', 'Admin\\gradeController1@create')->name('create1');
Route::get('/admin/{id}/edit1', 'Admin\\reportController1@edit')->name('edit1');

Route::post('/admin/report/{id}', 'Admin\reportController@completedUpdate')->name('completedUpdate');

Route::post('/auth/register/{id}', 'Admin\reportController@completedUpdate1')->name('completedUpdate1');
Route::post('/admin/grade1/{id}', 'Admin\reportController@completedUpdate2')->name('completedUpdate2');
Route::post('/admin/grade2/{id}', 'Admin\reportController@completedUpdate3')->name('completedUpdate3');


Route::get('admin/grade/{id}','Admin\\gradeController@getStates');

Route::resource('admin/report1', 'Admin\\reportController1');

Route::resource('admin/report', 'Admin\\reportController');

Route::middleware(['auth','verifyIsAdmin'])->group(function(){

    Route::resource('admin/course_detail', 'Admin\\course_detailController');
  
    Route::resource('admin/department', 'Admin\\departmentController');
    Route::resource('admin/courses', 'Admin\\coursesController');
    Route::resource('admin/subcategory', 'Admin\\subcategoryController');
    Route::resource('admin/subgroup', 'Admin\\subgroupController');
    Route::resource('admin/manage_course', 'Admin\\manage_courseController');
});


//Route::post('admin/grade/create',function(){});