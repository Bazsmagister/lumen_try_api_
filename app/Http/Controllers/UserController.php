<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('auth', ['except' => 'show']);
    }

    public function show($id)
    {
        $user =  User::findOrFail($id);
        dump($user);
        // return User::findOrFail($id);
        return $user;
    }

    public function profile()
    {
        return response()->json(['user' => Auth::user()], 200);
    }

    /**
    * Get all User.
    *
    * @return Response
    */
    public function allUsers()
    {
        return response()->json(['users' =>  User::all()], 200);
    }

    /**
     * Get one user.
     *
     * @return Response
     */
    public function singleUser($id)
    {
        try {
            $user = User::findOrFail($id);

            return response()->json(['user' => $user], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'user not found!'], 404);
        }
    }
}
