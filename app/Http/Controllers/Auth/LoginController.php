<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }



    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('admin/main/dashboard/dashboard');
        }

        return redirect()->back()->with("error", "The your email or password are incorrect.")->withInput($request->only('email'));
    }



    // public function login(Request $request) {
    //     $request->validate([
    //         'email' => 'required|string|email',
    //         'password' => 'required'
    //     ]);

    //     $credentials = $request->only('email', 'password');

    //     if(Auth::attempt($credentials)){
    //         $user = auth()->user();

    //         if($user->email_verified_at){
    //             return redirect()->intended(route('/dashboard'));
    //         }
    //         Auth::logout();

    //         return redirect(route('login'))->with("error", "Please verify your email to proceed.")->withInput( $request->except('password'));
    //     }

    //     return redirect(route('login'))->with("error", "The email or password you entered is incorrect.")->withInput( $request->except('password'));
    //     // if login failed
    // }

}
