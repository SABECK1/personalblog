
<head>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.css" />
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5-premium-features/42.0.1/ckeditor5-premium-features.css" />
    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.js",
                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.1/"
            }
        }
    </script>

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
                <li><a class="{{ request('tab') == 'admin' ? 'active' : null }}"
                       href="{{route('dashboard', ['tab' => 'admin'])}}"
                       data-url="{{ route('/dashboard/admin') }}">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                        <span class="link-name">Administrator</span>
                    </a></li>
            </ul>
        </div>
    </div>


    <section class="dashboard-content">
        @if ($errors->any())
            {!! implode('', $errors->all('<div class="message error">:message</div>')) !!}
        @elseif (session()->has('status'))
            <div class="message success">{{ session()->get('status') }}</div>
        @endif
        <div class="loader" id="loading-icon"></div>
        <div id="postform">

        </div>
        <div id="tabcontent">

        </div>
{{--        Will be filled using AJAX using the Tabcontroller --}}
    </section>
</div>
<script type="module" src="{{ asset('/js/tabcontroller.js') }}"></script>




