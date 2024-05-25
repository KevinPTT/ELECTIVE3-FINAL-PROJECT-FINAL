<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class userregisterController extends Controller
{
    public function userregisterPost(Request $request) {
        $request->validate([
            'first_name' => 'required|string|max:128',
            'last_name' => 'required|string|max:128',
            'phone_number' => 'required|size:11|regex:/(09)[0-9]{9}/',
            'address' => 'required|string|max:128',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'gender' => 'required|in:male,female'
        ]);

        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->phone_number = $request->input('phone_number');
        $user->address = $request->input('address');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'user'; // set the role value directly
        $user->gender = $request->input('gender');

        if($user->save()){
            return redirect(route('userlogin'))->with("success", "Account has been created. Please verify your email to proceed");
        } else {
            return redirect(route('/userlogin'))->with("error", "login details are not valid")->withInput();
        }
    }



   public function validateRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles(['user']);

        return redirect()->back()->with('success', 'User created successfully.');
    }
}
