<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\SeekerRegistrationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function createSeeker(){
        return view('users.seeker-registery');
    }

    public function createEmployer(){
        return view('users.employer-registery');
    }


    public function storeSeeker(SeekerRegistrationRequest $request){
       $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')), // Use bcrypt to hash the password
            'user_type' => "Seeker",

        ]);

        Auth::login($user);

        $user->sendEmailVerificationNotification();

        return response()->json('success');

        // return redirect()->route('verification.notice')->with('successMessage','Your account was created!');
    }

    public function storeEmployer(SeekerRegistrationRequest $request){
       $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')), // Use bcrypt to hash the password
            'user_type' => "Employer",
            'user_trial' => now()->addWeek(),
        ]);

        Auth::login($user);

        $user->sendEmailVerificationNotification();


        return response()->json('success');
        // return redirect()->route('verification.notice')->with('successMessage','Your account was created!');
    }

      // login user
     public function login(){
       return view('users.login');
   }

   public function postLogin(Request $request){
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required']
    ]);

    $credantials = $request->only('email','password');
    if(Auth::attempt($credantials)){
        return redirect()->intended('dashboard');
    }

    return "Wrong email or Password";
 }

 public function logout(){
    Auth::logout();
    return redirect()->route('login');
 }

 public function profile(){
    return view('profile.index');
 }

 public function update(Request $request){
      if($request->hasFile('profile_pic')){
        $imagepath = $request->file('profile_pic')->store('profile','public');
        User::find(auth()->user()->id)->update(['profile_pic'=> $imagepath]);
      }

      User::find(auth()->user()->id)->update($request->except('profile_pic'));
 }
}
