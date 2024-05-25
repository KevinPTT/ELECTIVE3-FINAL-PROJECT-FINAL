<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Traits\HasRoles;

class userloginController extends Controller
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

    public function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && $user->hasRole('user')) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect()->intended('/');
            }
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }


   public function userlogin(Request $request)
{
    // Validate the request
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    // Get email and password from the request
    $credentials = $request->only('email', 'password');

    // Attempt to log in the user
    if (Auth::attempt($credentials)) {
        return redirect()->intended('user/main/dashboard');
    }

    // If login failed
    return redirect()->back()->with("error", "Your email or password is incorrect.")->withInput($request->only('email'));
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
