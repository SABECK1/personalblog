
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

    <div class="tab-content">
        <div class="{{ request('tab') == 'profile' || !request()->has('tab') ? 'active' : null }}" id="profile">
            <p>Loading...Profile</p>
        </div>
        <div class="tab-pane fade {{ request('tab') == 'content' ? 'active' : null }}" id="content">
            <p>Loading...Content</p>
        </div>
        <div class="tab-pane fade {{ request('tab') == 'account' ? 'active' : null }}" id="account">
            <p>Loading...Account</p>
        </div>
    </div>
</div>
</div>

