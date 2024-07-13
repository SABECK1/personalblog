
<head>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('/js/tabcontroller.js') }} " defer></script>
</head>
<livewire:header/>
<div class="container">

<div class="main">
    <h1>Profile</h1>
    <div class="horizontal-tabs">
        <a class="{{ request('tab') == 'profile' || !request()->has('tab') ? 'active' : null }}" href="{{route('/dashboard/profile', ['tab' => 'profile'])}}" data-url="{{ route('/dashboard/profile') }}">Profile</a>
        <a class="{{ request('tab') == 'content' ? 'active' : null }}" href="{{route('/dashboard/content', ['tab' => 'content'])}}" data-url="{{ route('/dashboard/content') }}">Content</a>
        <a class="{{ request('tab') == 'account' ? 'active' : null }}" href="{{route('/dashboard/account', ['tab' => 'account'])}}" data-url="{{ route('/dashboard/account') }}">Account</a>
    </div>
{{--    <ul class="nav nav-tabs">--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link {{ request('tab') == 'profile' || !request()->has('tab') ? 'active' : '' }}" href="{{ route('/dashboard/index', ['tab' => 'home']) }}" data-url="{{ route('/dashboard/profile') }}">Home</a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link {{ request('tab') == 'content' ? 'active' : '' }}" href="{{ route('/dashboard/index', ['tab' => 'content']) }}" data-url="{{ route('/dashboard/content') }}">About</a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link {{ request('tab') == 'contact' ? 'active' : '' }}" href="{{ route('/dashboard/index', ['tab' => 'contact']) }}" data-url="{{ route('/dashboard/account') }}">Contact</a>--}}
{{--        </li>--}}
{{--    </ul>--}}

    <div class="tab-content">
        <div class="{{ request('tab') == 'profile' || !request()->has('tab') ? 'active' : null }}" id="profile">
            <p>Loading...Profile</p>
        </div>
        <div class="{{ request('tab') == 'content' ? 'active' : null }}" id="content">
            <p>Loading...Content</p>
        </div>
        <div class="{{ request('tab') == 'account' ? 'active' : null }}" id="account">
            <p>Loading...Account</p>
        </div>
    </div>
</div>
</div>

