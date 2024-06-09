@extends('layouts.template')

@section('content')

    <body class="light-theme">

        <div class="form-template">
            <section class="container">
                <div class="two-sided-container">
                    <div class="two-sided-container-banner left" style="left: 350px">
                        <img src="{{ asset('images/new-password.png') }}" alt="">
                        <a
                            href="https://www.freepik.com/free-vector/blocking-internet-icon_23182830.htm#query=forgot%20password&position=4&from_view=keyword&track=ais_user&uuid=24c0e580-ba68-483a-a407-857152d9303d">Image
                            by macrovector</a> on Freepik
                    </div>

                    <div class="register">
                        <span>Please confirm your new Password</span>
                        <h2 class="title">
                            New Password
                        </h2>
                        <form action="{{ route('password.store') }}" method="POST" id="resetform" novalidate>
                            @csrf
                            <input type="hidden" name="password_token" value="{{ $token }}">
                            @if ($errors->any())
                                {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                            @elseif (session()->has('status'))
                                <div class="success">{{ session()->get('status') }}</div>
                                <script>
                                    setTimeout(function() {
                                        window.location.href = {{ route('home') }}
                                    }, 3000); // 2 second
                                </script>
                            @endif
                            <div>
                                <input type="email" class="textinput email" placeholder="E-Mail" name="reset_email"
                                    id="reset_email" value={{ old('email') }}>
                            </div>
                            <div>
                                <input type="password" class="textinput password" placeholder="Password"
                                    name="reset_password" id="reset_password">
                            </div>
                            <div>
                                <input type="password" class="textinput password" placeholder="Confirm Password"
                                    name="reset_password_confirm" id="reset_password_confirm">
                            </div>
                            <div>
                                <button class="btn btn-primary" name="confirm_new_password_button">Confirm New
                                    Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </body>
@endsection
