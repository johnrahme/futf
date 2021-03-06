<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//startsida
Route::get('/', array('as' => 'start', 'uses' => 'HomeController@index'));

Route::get('futflogin', array('as' => 'adminStart', 'uses' => 'HomeController@adminIndex'));



//Users

Route::get('users', array('as' => 'users', 'uses' => 'UserController@index'))->before('auth');

Route::get('users/new', array('as' => 'new_user', 'uses' => 'UserController@newuser'));

Route::get('users/{id}', array('as' => 'user', 'uses' => 'UserController@view'));

Route::post('users/create', array('uses' => 'UserController@createUser'));

Route::get('users/{id}/edit', array('as' => 'edit_user', 'uses' => 'UserController@edit'));


Route::put('users/update', array('uses' => 'UserController@update'));

Route::delete('users/delete', array('uses' => 'UserController@destroy'));

//events

Route::get('events', array('as' => 'events', 'uses' => 'EventController@index'));

Route::get('events/new', array('as' => 'new_event', 'uses' => 'EventController@newevent'))->before('auth');

Route::get('event/{id}', array('as' => 'event', 'uses' => 'EventController@view'));

Route::post('events/create', array('uses' => 'EventController@createEvent'))->before('auth');

Route::get('events/{id}/edit', array('as' => 'edit_event', 'uses' => 'EventController@edit'))->before('auth');


Route::put('events/update', array('uses' => 'EventController@update'))->before('auth');

Route::delete('events/delete', array('uses' => 'EventController@destroy'))->before('auth');

Route::get('event/{id}/map', array('as' => 'map', 'uses' => 'EventController@map'));

Route::post('events/imgstore', array('as' => 'imgstore', 'uses' => 'EventController@imgstore'));

//registrations

Route::get('event/{id}/registrations', array('as' => 'registrations', 'uses' => 'RegistrationController@index'))->before('auth');

Route::get('event/{id}/registrations/new', array('as' => 'new_registration', 'uses' => 'RegistrationController@newRegistration'));

Route::post('events/registrations/create', array('uses' => 'RegistrationController@createRegistration'));

Route::delete('registrations/delete', array('uses' => 'RegistrationController@destroy'))->before('auth');

Route::post('registrations/download', array('as' => 'registrations.download', 'uses' => 'RegistrationController@download'))->before('auth');


//contactPage

Route::get('contact', array('as' => 'contact', 'uses' => 'ContactController@index'));

Route::post('contact/send', array('as' => 'send', 'uses' => 'ContactController@send'));

Route::get('contact/sent', array('as' => 'sent', 'uses' => 'ContactController@sent'));

//admin

Route::get('admin', array('as' => 'admin', 'uses' => 'AdminController@index'))->before('auth');

Route::group(array('before' => 'auth|hasAdminLevel'), function () {
    Route::get('admin/new', array('as' => 'new_admin', 'uses' => 'AdminController@newadmin'));
});
Route::post('admin/create', array('uses' => 'AdminController@createAdmin'));
//function
Route::filter('hasAdminLevel', function () {
    if (Auth::user()->level != '2') {
        return Redirect::to('/');
    }
});

Route::get('styrelsen', array('as' => 'admin.viewPublic', 'uses' => 'AdminController@viewAllAdminsPublic'));

//Skapar konto för ny användare
Route::post('admin/create/reg', array('uses' => 'AdminController@createAdminReg'))->before('auth');

Route::get('admin/{id}', array('as' => 'user_id', 'uses' => 'AdminController@view'));

Route::get('admin/{id}/edit', array('as' => 'edit_admin', 'uses' => 'AdminController@edit'))->before('auth');

Route::get('admin/{id}/view', array('as' => 'view_admin', 'uses' => 'AdminController@view'));


Route::put('admin/update', array('uses' => 'AdminController@update'))->before('auth');

Route::delete('admin/delete', array('uses' => 'AdminController@destroy'))->before('auth');

//sessions

Route::get('login', array('as' => 'login', 'uses' => 'SessionsController@create'));

Route::get('logout', array('as' => 'logout', 'uses' => 'SessionsController@destroy'))->before('auth');

Route::get('forgot', array('as' => 'forgot', 'uses' => 'SessionsController@forgot'));

Route::put('recover', array('as' => 'recover', 'uses' => 'SessionsController@recover'));

Route::resource('sessions', 'SessionsController', ['only' => ['store', 'index', 'create', 'destroy']]);

Route::post('storeLinkedIn', array('as' => 'storeLinkedIn', 'uses' => 'SessionsController@storeLinkedIn'));



//news
Route::get('news', array('as' => 'news', 'uses' => 'NewsController@index'));

Route::get('news/create', array('as' => 'news.create', 'uses' => 'NewsController@create'))->before('auth');

Route::get('news/{id}', array('as' => 'news.show', 'uses' => 'NewsController@show'));

Route::post('news/store', array('uses' => 'NewsController@store'))->before('auth');

Route::get('news/{id}/edit', array('as' => 'news.edit', 'uses' => 'NewsController@edit'))->before('auth');


Route::put('news/update', array('uses' => 'NewsController@update'))->before('auth');

Route::delete('news/delete', array('uses' => 'NewsController@destroy'))->before('auth');

//samarbetspartners
Route::get('samarbetspartners', array('as' => 'samarbetspartners', 'uses' => 'SamarbetspartnersController@index'));

Route::get('samarbetspartners/create', array('as' => 'samarbetspartners.create', 'uses' => 'SamarbetspartnersController@create'))->before('auth');

Route::get('samarbetspartners/{id}', array('as' => 'samarbetspartners.show', 'uses' => 'SamarbetspartnersController@show'));

Route::post('samarbetspartners/store', array('uses' => 'SamarbetspartnersController@store'))->before('auth');

Route::get('samarbetspartners/{id}/edit', array('as' => 'samarbetspartners.edit', 'uses' => 'SamarbetspartnersController@edit'))->before('auth');


Route::put('samarbetspartners/update', array('uses' => 'SamarbetspartnersController@update'))->before('auth');

Route::delete('samarbetspartners/delete', array('uses' => 'SamarbetspartnersController@destroy'))->before('auth');


// Files
Route::get('files', array('as' => 'ownCloud', 'uses' => 'OwnCloudController@index'));

//Games

//tower_defense
Route::get('tower_defense', array('as' => 'tower_defense', 'uses' => 'TowerDefenseController@index'));
//snake
Route::get('snake', array('as' => 'snake', 'uses' => 'SnakeController@index'));

//creators
Route::get('creators', array('as' => 'creators', 'uses' => 'CreatorsController@index'));

//Samarbetspartners
Route::get('samarbetspartners', array('as' => 'samarbetspartners', 'uses' => 'SamarbetspartnersController@index'));

//Cookies
Route::get('cookiepolicy', array('as' => 'cookie', 'uses' => 'CookieController@index'));

// Hemsidor
Route::get('futfsgamlahemsida', array('as' => 'cookie', 'uses' => 'HemsidorController@FUTF_Old'));
Route::get('nyhetsbrev', array('as' => 'cookie', 'uses' => 'HemsidorController@FUTF_nyhetsbrev'));
Route::get('alumnsidan', array('as' => 'cookie', 'uses' => 'HemsidorController@FUTF_alumn'));

// 404 Errors
Route::get('404', array('as' => '404', 'uses' => 'ErrorController@missing'));

// Kalender
Route::get('kalender', array('uses' => 'KalenderController@index'));

//Dynamic menu, lägg sist!

Route::resource('menu', 'MenuController');

Route::get('menu', array('as' => 'menu', 'uses' => 'MenuController@index'))->before('auth'); /*För att ../menu inte ska vara åtkomlig för icke-inloggade.*/

Route::get('menu/{type}/{id}/change', array('as' => 'menu.change', 'uses' => 'MenuController@change'))->before('auth');

/*Lägg till ->before('auth'); på dessa 3, om de har status offline*/
Route::get('{page}', array('as' => 'menu.dyn', 'uses' => 'MenuController@dynUrl'));
Route::get('{page}/{page2}', array('as' => 'menu.dyn', 'uses' => 'MenuController@dynUrl2'));
Route::get('{page}/{page2}/{page3}', array('as' => 'menu.dyn', 'uses' => 'MenuController@dynUrl3'));

Route::post('menu/arrange', array('as' => 'menu.arrange', 'uses' => 'MenuController@arrange'))->before('auth');
Route::delete('menu/{id}/delete', array('as' => 'menu.destroySub', 'uses' => 'MenuController@destroySub'))->before('auth');
Route::delete('menu/{id}/delete2', array('as' => 'menu.destroySubSub', 'uses' => 'MenuController@destroySubSub'))->before('auth');