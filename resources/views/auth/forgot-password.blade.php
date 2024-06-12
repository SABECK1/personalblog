@extends('layouts.template')


@section('content')
    <script src="{{ asset('/js/validation_forgot_password.js') }}" defer></script>
    <body class="light-theme">

    <div class="form-template">
        <section class="container">
            <div class="two-sided-container">
                <div class="two-sided-container-banner left" style="left: 350px">
                    <img src="{{ asset('images/reset-password.png') }}" alt="">
                    <a href="https://storyset.com/online">Online illustrations by Storyset</a>
                </div>

                <div class="register">
                    <span>Need help?</span>
                    <h2 class="title">
                        Reset Password
                    </h2>
                    <form action="{{ route('password.email') }}" method="POST" id="forgotform" novalidate>
                        @csrf
                        @if ($errors->any())
                            {!! implode('', $errors->all('<div class="error">:message</div>'))!!}
                        @elseif (session()->has('status'))
                            <div class="success">{{ session()->get('status') }}</div>
                        @endif
                        <div>
                            <input type="email" class="textinput email" placeholder="E-Mail" name="forgot_email"
                                   id="forgot_email">
                        </div>
                        <div>
                            <button class="btn btn-primary" name="Reset_Password_Button">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    </body>
@endsection
