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


Route::get('admin/login','AdminAuthController@login')->name('login');
Route::post('admin/login','AdminAuthController@postlogin');

Route::get('login','AdminAuthController@login')->name('login');;
Route::post('login','AdminAuthController@postlogin');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function () {
        return view('User.User_home');
    });
    Route::resource('votes', 'VoteController');
    Route::get('votes_Create/{id}', 'VoteController@createVote');
    Route::post('votes_Create/{id}', 'VoteController@createVotePost');
});

Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function() {
    Route::get('/', function () {
        return view('Admin.Admin_home');
    });
    Route::resource('users', 'UserController');
    Route::get('users/{id}/delete','UserController@delete')->name('users.delete');
    Route::post('user/{id}/edit','UserController@update')->name('users.update');


    Route::resource('surveys', 'SurveyController');
    Route::get('surveys/{id}/delete','SurveyController@delete')->name('surveys.delete');
    Route::post('survey/{id}/edit','SurveyController@update')->name('surveys.update');
    Route::post('survey/{id}/question/create','QuestionController@store')->name('questions.store');
    Route::post('question/{id}/edit','QuestionController@update')->name('questions.update');
    Route::get('questions/{id}/delete','QuestionController@delete')->name('questions.delete');
    Route::get('survey/{id}/result','SurveyController@result')->name('surveys.result');


    Route::get('logout', 'UserController@logout');
    Route::resource('groups', 'GroupController');
    Route::get('groups/{id}/delete','GroupController@delete')->name('groups.delete');
    Route::post('groups/{id}/update','GroupController@update')->name('groups.update');


    Route::resource('departments', 'DepartmentController');
    Route::get('departments/{id}/delete','DepartmentController@delete')->name('departments.delete');
    Route::post('departments/{id}/update','DepartmentController@update')->name('departments.update');
    Route::resource('courses', 'CourseController');
    Route::get('courses/{id}/delete','CourseController@delete')->name('courses.delete');
    Route::post('courses/{id}/update','CourseController@update')->name('courses.update');
    Route::view('about_us','Admin.about_us');


});
