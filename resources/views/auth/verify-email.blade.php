@extends('layouts.template')

@section('content')
    <div class="main">
    <div class="container verify_email">

        <span class="h3">
        {{ __('Thanks for signing up! To perform this action, please verify your email.') }}
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
