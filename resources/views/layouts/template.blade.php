<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="UTF-8" <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- FA-Icons --}}
    <script src="https://kit.fontawesome.com/4ab20c1496.js" crossorigin="anonymous"></script>

    {{-- DevICON --}}
    <link rel="stylesheet" type='text/css' href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css" />

    {{-- Vanilla CSS Stylesheet --}}
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">

    {{-- Just-Validate --}}
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="{{ asset('/js/validation.js') }} " defer></script>
    <script src="{{ asset('/js/validation_contact.js') }} " defer></script>
    <script src="{{ asset('/js/validation_forgot_password.js') }}" defer></script>
</head>

<body class="light-theme">
    <div class="container">
        <header class="header">
            <div class="btn-group">

                <button id="theme-toggle-mobile">
                    <div class="logo-dark">
                    <i name="moon" class="fa-solid fa-moon"></i>
                    </div>
                    <div class="logo-light">
                    <i name="sunny" class="fa-solid fa-sun"></i>
                    </div>
                </button>

                <button class="nav-menu-btn">
                    <i class="fa-solid fa-bars"></i>
                </button>

            </div>


            <nav class="flex-wrapper navbar">
                <a href="{{ route('home') }}" class="">Home</a>
                <a href="{{ route('articles') }}" class="">Articles</a>
                <a href="{{ route('about') }}" class="">About</a>
                <a href="{{ route('contact') }}" class="">Contact</a>
            </nav>

            <div class='flex-wrapper navbar'>
                <div id='theme-toggle'>
                    <i></i>
                </div>
                <i class="fa-solid fa-user"></i>
                @guest
                    <a href="{{ route('login.create') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @else
                    <span>{{ Auth::user()->name }}</span>
                    <form method="post" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-secondary" id='logout-btn'><span>Sign Out&nbsp;</span><i
                                class="fa fa-sign-out"></i></button>
                    </form>
                @endguest
            </div>
        </header>
    </div>
    @yield('content')
    @include('layouts.footer')
</body>
<script>
    function goToUrl(url, event) {
        // Navigate to the specified URL
        window.location.href = url;
        event.stopPropagation();
    }

    const toggle = document.getElementById('theme-toggle');
    const toggle_icon = document.querySelector('#theme-toggle i');
    const body = document.querySelector('body');

    function toggleTheme() {
        if (localStorage.getItem('theme') != 'dark') {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
        setTheme();
    }

    function setTheme() {
        if (localStorage.getItem('theme') == 'dark') {
            body.classList.add('dark-theme');
            body.classList.remove('light-theme');
            toggle.classList.add('active');
            toggle_icon.classList.add('fa-solid');
            toggle_icon.classList.remove('fa-sun');
            toggle_icon.classList.add('fa-moon');
            toggle_icon.style.color = "black";
        } else {
            body.classList.add('light-theme');
            body.classList.remove('dark-theme');
            toggle.classList.remove('active');
            toggle_icon.classList.add('fa-solid');
            toggle_icon.classList.remove('fa-moon');
            toggle_icon.classList.add('fa-sun');
            toggle_icon.style.color = "orange";
        }

    }
    toggle.addEventListener('click', toggleTheme);
    setTheme();
</script>

</html>
