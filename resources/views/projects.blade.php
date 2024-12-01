@extends('layouts.template')

@section('content')
    <script src="{{ asset('/js/validation_contact.js') }} " defer></script>
    <body class="light-theme">
    <div class="main">
        <div class="blog">
            <h2 class="h1">Interesting Projects</h2>
            <section class="container">
                <div class="blog-card-group">
{{--                    @foreach ($posts as $post)--}}
{{--                        <x-blog_card :post="$post"/>--}}
{{--                    @endforeach--}}
                </div>
            </section>
        </div>
    </div>
@endsection
