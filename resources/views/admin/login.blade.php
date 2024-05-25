<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Link to Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Link to your custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <div class="container" id="container">

    <div class="form-container sign-up">



        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <h1>Create Account</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
            <span>or use your email for registration</span>
            <input type="text" name="first_name" placeholder="first Name"> <!-- Name attribute added -->
            <input type="text" name="last_name" placeholder="Last Name"> <!-- Name attribute added -->

            <input type="email" name="email" placeholder="Email"> <!-- Name attribute added -->
            <input type="password" name="password" placeholder="Password"> <!-- Name attribute added -->
            <button type="submit">Sign Up</button> <!-- type="submit" added -->
        </form>




        </div>
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('login.post') }}">
                @if(session()->has("error"))
                    <div class="warning-messages" style="color:red">
                        <p>{{session("error")}}</p>
                    </div>
                @endif
                @csrf
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email password</span>
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <a href="#">Forget Your Password?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>



        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Welcome <br> to <br> Zam-Olo</h1>
                    <p>explore and find more beauriful spot</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Link to your custom JavaScript file -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
