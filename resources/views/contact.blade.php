@extends('layouts.template')

@section('content')
    <script src="{{ asset('/js/validation_contact.js') }} " defer></script>
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
                        @guest
                        <form action="{{ route('contact.mail_guest') }}" method="POST" id="contactform_guest">
                            @csrf
                            @if ($errors->any())
                                {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                            @endif
                            <div>
                                <input type="email" class="textinput email" placeholder="E-Mail" name="contact_email_guest"
                                    id="contact_email_guest">
                            </div>
                            <div class="textinput">
                                <textarea id="contact_message_guest" name="contact_message_guest" class="textinput" placeholder="Your Message..."></textarea>
                            </div>
                            <div>
                                <button type="submit" name="contact_message_submit" class="btn btn-primary">
                                    <i class="fas fa-envelope"></i>
                                    Send Message</button>
                            </div>
                        </form>
                        @endguest
                        @auth
                            <form action="{{ route('contact.mail'), $user }}" method="POST" id="contactform_auth">
                                @csrf
                                @if ($errors->any())
                                    {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                                @endif
                                <div class="textinput">
                                    <textarea id="contact_message_auth" name="contact_message_auth" class="textinput" placeholder="Your Message..."></textarea>
                                </div>
                                <div>
                                    <button type="submit" name="contact_message_submit" class="btn btn-primary">
                                        <i class="fas fa-envelope"></i>
                                        Send Message</button>
                                </div>
                            </form>
                        @endauth
                    </div>
                </div>
            </section>
        </div>
    @endsection
