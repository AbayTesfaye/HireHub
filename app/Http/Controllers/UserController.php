<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\SeekerRegistrationRequest;

class UserController extends Controller
{
    public function createSeeker(){
        return view('users.seeker-registery');
    }
    public function storeSeeker(SeekerRegistrationRequest $request){
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')), // Use bcrypt to hash the password
            'user_type' => "Seeker",
        ]);

        return back();
    }
}
