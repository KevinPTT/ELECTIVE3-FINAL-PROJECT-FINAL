<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // public function showRegistrationForm()
    // {
    //     return view('auth.register');
    // }

    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);
    //     return redirect()->route('login')->with('success', 'Registration successful. Please login.');

    // }


    // public function showRegistrationForm()
    // {
    //     return view('register');
    // }

    // public function register(Request $request)
    // {
    //     // Validate the input
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8|confirmed',
    //     ]);

    //     // Create a new user record
    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //     ]);

    //     // Automatically log in the new user
    //     Auth::login($user);

    //     // Redirect to the dashboard or any desired page
    //     return redirect('/dashboard');
    // }

    public function registerPost(Request $request) {
        $request->validate([
            'first_name' => 'required|string|max:128',
            'last_name' => 'required|string|max:128',
            // 'contact_num' => 'required|size:11|regex:/(09)[0-9]{9}/',
            // 'address' => 'required|string|max:128',
            // 'birthdate' => 'required|date|before:18 years ago',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            // 'role' => 'required|in:landowner,renter'
        ]);

        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'admin'; // set the role value directly

        $data['first_name'] = $user->first_name;
        $data['last_name'] = $user->last_name;
        $data['gender'] = $user->gender;
        $data['email'] = $user->email;
        $data['phone_number'] = $user->phone_number;
        $data['address'] = $user->address;



        if($user->save()){
            return redirect(route('/login'))->with("success", "Account has been created. Please verify your email to proceed");
        } else {
            return redirect(route('/login'))->with("error", "login details are not valid")->withInput();
        }
    }


}
