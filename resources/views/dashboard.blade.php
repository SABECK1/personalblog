
<head>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('/js/tabcontroller.js') }} " defer></script>
</head>
<livewire:header/>




<div class="dashboard">
    <div class="dashboard-sidebar" id="dashboard-tabs">
        <div class="menu-items">
            <ul class="nav-links">
                <li>
                    <a class="{{ request('tab') == 'profile' || !request()->has('tab') ? 'active' : null }}"
                       href="{{route('dashboard', ['tab' => 'profile'])}}"
                       data-url="{{ route('/dashboard/profile') }}" >
                        <i class="fa-solid fa-user"></i>
                        <span class="link-name">Profile</span>
                    </a></li>
                <li><a class="{{ request('tab') == 'content' ? 'active' : null }}"
                       href="{{route('dashboard', ['tab' => 'content'])}}"
                       data-url="{{ route('/dashboard/content') }}">
                        <i class="fa-solid fa-folder-tree"></i>
                        <span class="link-name">Content</span>
                    </a></li>
                <li><a class="{{ request('tab') == 'account' ? 'active' : null }}"
                       href="{{route('dashboard', ['tab' => 'account'])}}"
                       data-url="{{ route('/dashboard/account') }}">
                        <i class="fa-solid fa-address-card"></i>
                        <span class="link-name">Account</span>
                    </a></li>
            </ul>
        </div>
    </div>
    <section class="dashboard-content">
        <div class="top">
            <i class="fa-solid fa-bars"></i>

            <!--<img src="images/profile.jpg" alt="">-->
        </div>
{{--        Will be filled using AJAX using the Tabcontroller --}}
    </section>
</div>




