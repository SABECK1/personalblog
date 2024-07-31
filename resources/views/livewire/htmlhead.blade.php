<div>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- FA-Icons --}}
        <script src="https://kit.fontawesome.com/4ab20c1496.js" crossorigin="anonymous"></script>

        {{-- DevICON --}}
        <link rel="stylesheet" type='text/css' href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css"/>

        {{-- Vanilla CSS Stylesheet --}}
        <link rel="stylesheet" href="{{ asset('style.css') }}">
        <link rel="stylesheet" href="{{asset('/assets/vendor/style.css')}}">

        {{-- Google Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">


        <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>


        {{-- Other Javascript Functionality --}}
        <script src="{{ asset('/js/theme-toggle.js') }}" defer></script>
        <script src="{{ asset('/js/hide_messages.js') }}"></script>
    </head>
</div>
