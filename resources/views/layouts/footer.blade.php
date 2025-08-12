<div class="footer">
    <div class="footer-content">
        <div class="footer-section about">
            <h2 class="logo-text"><span>Samuel Beck</span></h2>
            <br>
            <p>Welcome to my Blog, where I write about stuff I learned that I'd probably forget otherwise!
            </p>
{{--            <div class="contact">--}}
{{--                <span><i class="fas fa-phone">&nbsp; +49 123456789</i></span>--}}
{{--                <span><i class="fas fa-envelope">&nbsp; test@gmail.com</i></span>--}}
{{--            </div>--}}
        </div>
        <div class="footer-section links">
            <h2>Quick Links</h2>
            <br>
            <ul>
                <li>
                    <a href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('login') }}">
                        Sign In/Register
                    </a>
                </li>
                <li>
                    <a href="{{ route('posts') }}">
                        Posts
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}">
                        About
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact') }}">
                        Contact
                    </a>
                </li>
                <li>
                    <a href="#">
                        Terms and Conditions
                    </a>
                </li>
            </ul>
        </div>
        <div class="footer-section contact-form">
            <h2>Contact</h2>
            <br>
            <p>Message me directly without needing to register. Business inquiries only</p>
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
        </div>

    </div>

</div>
<div class="footer-bottom">
    &copy; Designed by Samuel Beck
</div>
