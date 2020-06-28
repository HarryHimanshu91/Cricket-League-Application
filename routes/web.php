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



Route::group([ "middleware" => "admin" ], function(){
    Route::get('/dashboard','AdminHomeController@dashboard');
    Route::resource('teams','TeamController');
    Route::resource('player','PlayerController');
    Route::resource('locations','LocationController');
   Route::get('/match','MatchController@index')->name('match-index');
   Route::get('/match/create','MatchController@create')->name('match-create');
   Route::post('/match','MatchController@store')->name('match-store');
   Route::get('/match/{id}/edit','MatchController@edit')->name('match-edit');
   Route::put('/match/{id}','MatchController@update')->name('match-update');
   Route::delete('/match/{id}','MatchController@destroy')->name('match-destroy');
   Route::get('/match/{id}/manage','MatchController@matchmanage')->name('match-manage');
   Route::put('/match/manage/{id}','MatchController@matchresultSave')->name('match-resultSave');
  
});

Route::get('/login','AdminHomeController@adminLoginForm')->name('adminLogin');
Route::post('/check-login', 'AdminHomeController@checklogin')->name('checklogin');
Route::get("/logout", "AdminHomeController@logout")->name("adminlogout");

Route::get('/matches','CricketController@showUpcomingMatches')->name('viewMatch');
Route::get('/view-teams','CricketController@showTeams')->name('viewTeams');
Route::get('/team/{id}','CricketController@showTeamsMember')->name('showIdTeam');
Route::get('/points','CricketController@Points')->name('Points');
Route::get('/teamPoints/{id}','CricketController@TeamsPoints')->name('teamPoints');
