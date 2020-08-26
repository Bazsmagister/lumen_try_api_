<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function show($id)
    {
        $user =  User::findOrFail($id);
        dump($user);
        // return User::findOrFail($id);
        return $user;
    }
}
