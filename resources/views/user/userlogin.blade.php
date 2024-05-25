<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="{{ asset('css/userlogin.css') }}">
</head>
<body>
    <div class="login-form">
        <h1>WELCOME TO ZAM-OLO EXPLORE</h1>
        <div class="container">
            <div class="main">
                <div class="content">
                    <h2>Log In</h2>
                    <form method="POST" action="{{ route('userlogin.post') }}">
                        @if(session()->has("error"))
                        <div class="warning-messages" style="color:red">
                            <p>{{session("error")}}</p>
                        </div>
                    @endif
                    @csrf
                        <input type="email" name="email" placeholder="user email" required autofocus="">
                        <input type="password" name="password" placeholder="User Password" required autofocus="">
                         {{-- <button class="btn" type="submit">
                            Login
                         </button> --}}
                         <button type="submit">Sign In</button>

                    </form>
                    <p class="account">Don't Have An Account? <a href="{{ route('userregister')}}">Register</a></p>
                </div>
                <div class="form-img">
                    <img src="{{ asset('images/login.png') }}" alt="Background Image">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
