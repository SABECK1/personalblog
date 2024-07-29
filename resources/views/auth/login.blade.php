@extends('layouts.template')

@section('content')
    <script src="{{ asset('/js/validation_auth.js') }} " defer></script>
    <body class="light-theme">

        <div class="form-template">
            <section class="container">

                <div class="two-sided-container">
                    <div class="{{ Request::is('login') ? 'left' : 'right' }} two-sided-container-banner">
                        <img src="{{ asset('images/loginrobot.png') }}" alt="robot">
                        <a href="http://www.freepik.com">Designed by roserodionova / Freepik</a>
                    </div>


                    <div class="two-sided-container-side">
                        <span>Welcome!</span>
                        <h2 class="title">
                            Register
                        </h2>

                        <form action="{{ route('register') }}" method="POST" id="registerform" novalidate>
                            @csrf
                            @if ($errors->any() and Request::is('register'))
                                {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                            @endif
                            <div>
                                <input type="email" class="textinput email" placeholder="E-Mail" name="email"
                                    id="register_email">
                            </div>
                            <div>
                                <input type="text" class="textinput username" placeholder="Username" name="name"
                                    id="register_username">
                            </div>
                            <div>
                                <input type="password" class="textinput password" placeholder="Password" name="password"
                                    id="register_password">
                            </div>
                            <div>
                                <button class="btn btn-primary" name="Register_Button">Create Account</button>
                            </div>
                        </form>
                        <p class="existing-account" onclick="move('toLogin')">Already registered?</p>
                    </div>
                    <div class="two-sided-container-side">
                        <span>Welcome Back!</span>
                        <h2 class="title">
                            Sign In
                        </h2>
                        <form action="{{ route('login.store') }}" method="POST" id="loginform">
                            @csrf
                            @if ($errors->any() and Request::is('login'))
                                {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                            @elseif (session()->has('status'))
                                <div class="success">{{ session()->get('status') }}</div>
                            @endif
                            <div>
                                <input type="text" class="textinput" placeholder="Email/Username" name="loginkey"
                                    id="login_username" value="{{ old('loginkey') }}">
                            </div>
                            <div>
                                <input type="password" class="textinput password" placeholder="Password" name="password"
                                    id="login_password">
                            </div>
                            <div>
                                <a href="{{ route('password.request') }}" class="forgotpw">Reset Password</a>
                            </div>
                            <div>
                                <button class="btn btn-primary" name="Login_Button">Login</button>
                            </div>
                        </form>
                        <p class="existing-account" onclick="move('toRegister')">Not yet registered?</p>
                    </div>
                </div>
            </section>
        </div>
        <script>
            const banner = document.querySelector(".two-sided-container-banner")

            function move(e) {
                // adding the classes to edit the boxshadow according to banner location
                if (e == 'toRegister') {
                    banner.style.left = "350px"
                    banner.classList.remove("left")
                    banner.classList.add("right")
                } else {
                    banner.style.left = "0px"
                    banner.classList.remove("right")
                    banner.classList.add("left")
                }
            }
        </script>
    </body>
@endsection
