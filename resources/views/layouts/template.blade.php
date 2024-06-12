<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="UTF-8"
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- FA-Icons --}}
    <script src="https://kit.fontawesome.com/4ab20c1496.js" crossorigin="anonymous"></script>

    {{-- DevICON --}}
    <link rel="stylesheet" type='text/css' href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css"/>

    {{-- Vanilla CSS Stylesheet --}}
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">


    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>


    {{-- Other Javascript Functionality --}}
    <script src="{{ asset('/js/theme-toggle.js') }}" defer></script>
</head>

<body class="light-theme">
<div class="container">
    <div class="header">


        <div class="desktop-nav">
            <div class="flex-wrapper navbar">
                <a href="{{ route('home') }}" class="">Home</a>
                <a href="{{ route('articles') }}" class="">Articles</a>
                <a href="{{ route('about') }}" class="">About</a>
                <a href="{{ route('contact') }}" class="">Contact</a>
            </div>

            <div class='flex-wrapper navbar'>
                <div id='theme-toggle' class="theme-btn">
                    <div class="logo-dark">
                        <i name="moon" class="fa-solid fa-moon"></i>
                    </div>
                    <div class="logo-light">
                        <i name="sunny" class="fa-solid fa-sun"></i>
                    </div>
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
        </div>

        <div class="btn-group">

            <button id="theme-toggle-mobile" class="theme-btn">
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

        <div class="mobile-nav">

            <button class="nav-close-btn">
                <i class="fa-solid fa-x"></i>
            </button>

            <div class="wrapper">

                <p class="h3 nav-title">Main Menu</p>

                <ul>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">About Me</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
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
</script>


{{--    const toggle_icon = document.querySelector('#theme-toggle i');--}}
{{--    const body = document.querySelector('body');--}}



{{--    function setTheme() {--}}
{{--        if (localStorage.getItem('theme') == 'dark') {--}}
{{--            body.classList.add('dark-theme');--}}
{{--            body.classList.remove('light-theme');--}}
{{--            toggle.classList.add('active');--}}
{{--            toggle_icon.classList.add('fa-solid');--}}
{{--            toggle_icon.classList.remove('fa-sun');--}}
{{--            toggle_icon.classList.add('fa-moon');--}}
{{--            toggle_icon.style.color = "black";--}}
{{--        } else {--}}
{{--            body.classList.add('light-theme');--}}
{{--            body.classList.remove('dark-theme');--}}
{{--            toggle.classList.remove('active');--}}
{{--            toggle_icon.classList.add('fa-solid');--}}
{{--            toggle_icon.classList.remove('fa-moon');--}}
{{--            toggle_icon.classList.add('fa-sun');--}}
{{--            toggle_icon.style.color = "orange";--}}
{{--        }--}}

{{--    }--}}
{{--    toggle.addEventListener('click', toggleTheme);--}}
{{--    setTheme();--}}
{{--</script>--}}

</html>
