<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/* Social login */
Route::get('socialRedirect/{network}', 'SocialController@redirect');
Route::get('socialCallback/{network}', 'SocialController@callback');

/* Errors */
Route::get('{lang}/404', 'SocialController@errorPage');

Route::group(['middleware' => 'web'], function () {
    /* Auth */
    Auth::routes();
    Route::get('logout', 'Auth\LoginController@logout');

    /* Registration */
    Route::get('{lang}/registracija', 'Auth\RegisterController@showRegistrationForm');
    Route::get('{lang}/registracija-firme', 'Auth\RegisterController@showCompanyRegistrationForm');

    /* Messages */
    Route::get('/poruke', 'MessageController@index');
    Route::post('/send/message/now', 'MessageController@store');
    Route::post('/get-messages', 'MessageController@messages');
    Route::post('/messages/unread', 'MessageController@unread');
    Route::post('/send/message/search-message', 'MessageController@pretraga');

    /* Packages */
    Route::get('{lang}/paketi', 'PackagesController@packages');
    Route::get('{lang}/izaberi-paket/{package}', 'SubscriptionController@choose');

    /* Company */
    Route::get('{lang}/profil-kompanije', 'CompanyController@profile');
    Route::get('{lang}/profil-kompanije/izmena-podataka', 'CompanyController@edit');
    Route::get('{lang}/profil-kompanije/izmena-slika', 'CompanyController@images');
    Route::post('{lang}/profil-kompanije/izmena-slika', 'CompanyController@images');
    Route::post('/update-profile', 'CompanyController@update');
    Route::get('{lang}/profil/{id}/{title}', 'CompanyController@show');
    Route::post('save/working-hours', 'CompanyController@hours');
    Route::get('/delete/image/{id}', 'CompanyController@deleteimage');

    /* Customer */
    Route::get('{lang}/profil-korisnika', 'CustomerController@profile');
    Route::post('{lang}/profil-korisnika', 'CustomerController@profile');
    Route::get('{lang}/poruke-korisnika', 'CustomerController@messages');

    /* Search */
    Route::get('{lang}/pretraga/{subgroup}', 'SearchController@subcategory');
    Route::get('{lang}/pretraga-po-kategorijama/{group}', 'SearchController@category');
    Route::get('{lang}/napredna-pretraga', 'SearchController@advanced');
    Route::get('{lang}/osnovna-pretraga', 'SearchController@basic');

    /* Home */
    Route::get('/', 'HomeController@index');
    Route::get('{lang}/pocetna', 'HomeController@index');
    Route::get('{lang}/uslovi-koriscenja', 'HomeController@terms');
});

Route::get('images/{image}', function($filename)
{
    $filePath = storage_path().'/app/public/images/'.$filename;

    if ( !File::exists($filePath))
    {
        return Response::make("File does not exist.", 404);
    }

    $fileContents = File::get($filePath);

    return response($fileContents, 200)->header('Content-Type', 'image/jpeg');
});


