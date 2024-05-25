<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showDashboard()
    {
        return view('admin.main.dashboard.dashboard');
        return view('user.main.dashboard.dashboard');

    }



    public function showBooking()
    {
        return view('admin.main.booking.booking');
    }

    public function showLogin()
    {
        return view('admin.login');
    }

    // public function Login()
    // {
    //     return view('user.userlogin');
    // }
}
