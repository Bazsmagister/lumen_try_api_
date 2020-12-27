<?php

use Illuminate\Support\Str;

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

$router->get('user/{id}', 'UserController@show');


$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('authors', ['uses' => 'AuthorController@showAllAuthors']);

    $router->get('authors/{id}', ['uses' => 'AuthorController@showOneAuthor']);

    $router->post('authors', ['uses' => 'AuthorController@create']);

    $router->delete('authors/{id}', ['uses' => 'AuthorController@delete']);

    $router->put('authors/{id}', ['uses' => 'AuthorController@update']);
});



$router->group([
    // 'middleware' => 'auth',
    // 'prefix' => 'api'
    //I think there is no api middleware
     'middleware' => 'auth',
    'prefix' => 'auth'
], function () use ($router) {
    // $router->post('login', 'AuthController@login');
    // $router->post('logout', 'AuthController@logout');
    // $router->post('refresh', 'AuthController@refresh');
    // $router->post('me', 'AuthController@me');
    $router->post('login', ['uses' =>'AuthController@login']);
    $router->post('logout', ['uses' =>'AuthController@logout']);
    $router->post('refresh', ['uses' =>'AuthController@refresh']);
    $router->post('me', ['uses' =>'AuthController@me']);
});
