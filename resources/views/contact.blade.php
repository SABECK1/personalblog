@extends('layouts.template')

@section('content')

    <body class="light-theme">
        <div class="form-template">
            <section class="container">
                <div class="two-sided-container">
                    <div class="right two-sided-container-banner">
                        <img src="{{ asset('images/contact.png') }}" alt="contact">
                        <a href="http://www.freepik.com">Designed by Freepik</a>
                    </div>

                    <div class="two-sided-container-side">
                        <h2 class="title">
                            Let's get in touch!
                        </h2>
                        <form action="{{ route('contact') }}" method="POST" id="contactform">
                            @csrf
                            @if ($errors->any())
                                {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                            @endif
                            <div>
                                <input type="email" class="textinput email" placeholder="E-Mail" name="contact_email"
                                    id="contact_email">
                            </div>
                            <div class="textinput">
                                <textarea id="contact_message" name="contact_message" class="textinput" placeholder="Your Message..."></textarea>
                            </div>
                            <div>
                                <button type="submit" name="contact_message_submit" class="btn btn-primary">
                                    <i class="fas fa-envelope"></i>
                                    SendMessage</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    @endsection
