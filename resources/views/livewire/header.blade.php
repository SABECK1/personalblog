<div>
<livewire:htmlhead/>
<div class="container">
    <div class="header">
        <div class="desktop-nav">
            <div class="flex-wrapper navbar">
                <a href="{{ route('home') }}" class="">Home</a>
                <a href="{{ route('posts') }}" class="">Posts</a>
{{--                <a href="{{ route('about') }}" class="">About</a>--}}
                <a href="{{ route('contact') }}" class="">Contact</a>
                <a href="{{ route('projects') }}" class="">Projects</a>
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
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @else
                    <a href="{{route('dashboard')}}">{{ Auth::user()->name }}</a>
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


    </div>
</div>

<div class="mobile-nav">

    <button class="nav-close-btn">
        <i class="fa-solid fa-x"></i>
    </button>

    <div class="wrapper">

        <p class="h3 nav-title">Main Menu</p>

        <ul>
            <li class="nav-item">
                <a href="{{route('home')}}" class="nav-link">Home</a>
            </li>

            <li class="nav-item">
                <a href="{{route('dashboard')}}" class="nav-link">Profile</a>
            </li>

            <li class="nav-item">
                <a href="{{route('about')}}" class="nav-link">About Me</a>
            </li>

            <li class="nav-item">
                <a href="{{route('contact')}}" class="nav-link">Contact</a>
            </li>
        </ul>
    </div>
</div>
</div>
