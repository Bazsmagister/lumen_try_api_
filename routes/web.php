<?php

use Illuminate\Support\Str;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    // return $router->app->version();
    dump($router->app->version());

    $random32bitstring = Str::random(32);
    // dd($random32bitstring);

    //return view('form');

    return view('form', compact('random32bitstring'));
});

//I used this one without authentication. not the best approach, just I was curious.
$router->get('user/{id}', 'UserController@show');

//works well
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('authors', ['uses' => 'AuthorController@showAllAuthors']);

    $router->get('authors/{id}', ['uses' => 'AuthorController@showOneAuthor']);

    $router->post('authors', ['uses' => 'AuthorController@create']);

    $router->delete('authors/{id}', ['uses' => 'AuthorController@delete']);

    $router->put('authors/{id}', ['uses' => 'AuthorController@update']);
    // or patch
    $router->patch('authors/{id}', ['uses' => 'AuthorController@update']);
});



// $router->group([
//     //orig is:
//     //https://jwt-auth.readthedocs.io/en/stable/quick-start/
//     // 'middleware' => 'api',
//     // 'prefix' => 'auth'

//     //***** */

// ], function () use ($router) {
//     // $router->post('login', 'AuthController@login');
//     // $router->post('logout', 'AuthController@logout');
//     // $router->post('refresh', 'AuthController@refresh');
//     // $router->post('me', 'AuthController@me');
//     $router->post('login', ['uses' =>'AuthController@login']);
//     $router->post('logout', ['uses' =>'AuthController@logout']);
//     $router->post('refresh', ['uses' =>'AuthController@refresh']);
//     $router->post('me', ['uses' =>'AuthController@me']);
// });


//Thanks for this site:
//https://dev.to/ndiecodes/build-a-jwt-authenticated-api-with-lumen-2afm?fbclid=IwAR0aTMjhDXOj7UXdOeUrk7Y_yrZfIAYdHll5uLBE2hcd_iD8jWXpMSd1bIE

// API route group
$router->group(['prefix' => 'api'], function () use ($router) {
    // Matches "/api/register
    $router->post('register', 'AuthController@register');

    // Matches "/api/login
    $router->post('login', 'AuthController@login');

    //$router->post('me', ['uses' =>'AuthController@me']);

    // Matches "/api/profile
    //need to send an Authorization header with a bearer token.
    $router->get('profile', 'UserController@profile');


    //$router->post('me', ['uses' =>'AuthController@me']);
    $router->post('me', 'AuthController@me');


    // Matches "/api/users/1
    //get one user by id
    //need to send an Authorization header with a bearer token.

    $router->get('users/{id}', 'UserController@singleUser');

    // Matches "/api/users
    //need to send an Authorization header with a bearer token.

    $router->get('users', 'UserController@allUsers');

    //try on logout:
    //need to send an Authorization header with a bearer token.

    $router->post('logout', ['uses' =>'AuthController@logout']);
});
