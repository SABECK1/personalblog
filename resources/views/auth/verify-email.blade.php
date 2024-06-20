@extends('layouts.template')

@section('content')
    <div class="main">
    <div class="container verify_email">

        <span class="h3">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </span>

    @if (session('status') == 'verification-link-sent')
        <div class="message success">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif


        <div class="btn-group">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <button type="submit" class="btn btn-primary">
                    {{ ('Resend Verification Email') }}
                    </button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn btn-primary">
                {{ ('Log Out') }}
            </button>
        </form>
        </div>
    </div>
    </div>
@endsection
