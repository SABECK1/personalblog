@extends('layouts.template')


@section('content')
    <div class="hero">
        <div class="container">
            <div class="hero_left">
                <div class="h1">
                    Hi, I'm <b><a href="#" class="accent_link">Samuel Beck</a></b>,
                </div>
                Junior ABAP-Developer, Python and PHP enthusiast
                and the self-proclaimed author of <b>this blog!</b>
            </div>

            <div class="hero_right">
                <div class="img-box">
                    <img src="{{ asset('images/hero.png') }}" alt="Samuel Beck" class="hero_img">
                </div>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="blog">
            <h2 class="h1">Latest Blog Posts</h2>
            <section class="container">
                    <div class="blog-card-group">
                        @foreach ($posts as $post)
                            <x-blog_card :post="$post"/>
                        @endforeach
                            <button class="btn btn-primary load-more" onclick="goToUrl('{{ route('posts') }}')">See More</button>
                    </div>

                    <div class="sidebar-container">
                    <livewire:categorytable :categories="$categories"/>
                    <livewire:tagstable :tags="$tags"/>
                    </div>
            </section>

        </div>
    </div>

    </main>
@endsection
