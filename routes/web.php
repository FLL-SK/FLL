<?php

Route::get('/', [
    'uses' => 'WebController@index',
    'as' => 'web/index',
])->name('home');

Route::get('/admin', function () {
    return view('admin.login');
})->name('adminLogin');


// ****************************************************** ADMIN ROUTES ******************************************************

Route::group([
    'middleware' => ['auth', 'role:admin|editor'],
    'prefix' => 'admin'
    ], function () {

    Route::post('signin', array('uses' => 'SessionController@postSignInAdmin', 'as' => 'signinAdmin'));
    Route::post('signup', array('uses' => 'SessionController@postSignUpAdmin', 'as' => 'signupAdmin'));
    Route::get('logout', array('uses' => 'SessionController@getLogoutAdmin', 'as' => 'logoutAdmin'));

    Route::get('dashboard', array('uses' => 'DashboardController@index', 'as' => 'dashboard'));

    Route::get('teams/index', array('uses' => 'TeamsController@index', 'as' => 'teams/index'));
    Route::get('teams/all', array('uses' => 'TeamsController@all', 'as' => 'teams/all'));

    Route::patch('dates/patch', array('uses' => 'DatesController@patch', 'as' => 'dates/patch'));
    Route::delete('dates/delete/{date}', array('uses' => 'DatesController@delete', 'as' => 'dates/delete'));

    Route::get('users', array('uses' => 'UserController@index', 'as' => 'users/index'));
    Route::get('users/create', array('uses' => 'UserController@create', 'as' => 'users/create'));

    Route::get('news', array('uses' => 'NewsController@index', 'as' => 'news/index'));
    Route::get('news/create', array('uses' => 'NewsController@create', 'as' => 'news/create'));

    Route::get('kits', array('uses' => 'KitsController@index', 'as' => 'kits/index' ));
    Route::patch('kits/patch/{kit}', array('uses' => 'KitsController@patch', 'as' => 'kits/patch'));
    Route::patch('patchKitsLeft', array('uses' => 'AditionalsController@patchKitsLeft', 'as' => 'patchKitsLeft'));

    Route::get('invoices', array('uses' => 'InvoicesController@index', 'as' => 'invoices/index'));
    Route::patch('invoices/patch/{invoice}', array('uses' => 'InvoicesController@patch', 'as' => 'invoices/patch'));

    Route::post('id/store', array('uses' => 'IDsController@store', 'as' => 'id/store'));

    Route::get('export', array('uses' => 'ExportController@export', 'as' => 'export'));

    Route::patch('regions/patch', array('uses' => 'RegionsController@patch', 'as' => 'regions/patch'));
    Route::get('regions/delete/{region}', array('uses' => 'RegionsController@delete', 'as' => 'regions/delete'));

    Route::get('tournaments/index', array('uses' => 'TournamentsController@index', 'as' => 'tournaments/index'));
    Route::get('tournaments/archive', array('uses' => 'TournamentsController@archive', 'as' => 'tournaments/archive'));
    Route::get('tournaments/settings', array('uses' => 'TournamentsController@settings', 'as' => 'tournaments/settings'));
    Route::post('tournaments/new', array('uses' => 'TournamentsController@new', 'as' => 'tournaments/new'));

});

// ****************************************************** WEB ROUTES ******************************************************

Route::get('logout', array('uses' => 'SessionController@getLogout', 'as' => 'logout'));
Route::post('signin', array('uses' => 'SessionController@postSignIn', 'as' => 'signIn'));
Route::post('signup', array('uses' => 'SessionController@postSignUp', 'as' => 'signUp'));

Route::get('coach/create', array('uses' => 'CoachController@create', 'as' => 'coach/create'));
Route::post('coach/store', array('uses' => 'CoachController@store', 'as' => 'coach/store'));

Route::get('team/create', array('uses' => 'TeamController@create', 'as' => 'team/create'));
Route::post('team/store', array('uses' => 'TeamController@store', 'as' => 'team/store'));
