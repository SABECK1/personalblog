@extends('layouts.template')


@section('content')
    <div class="hero">
        <div class="container">
            <div class="hero_left">
                <div class="h1">
                    Hi, I'm <b><a href="#" class="about_hero">Samuel Beck</a></b>,
                </div>
                Junior ABAP-Developer, Python and C++ enthusiast
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
                            <div class="blog-card" onclick="goToUrl('{{ route('post.show', $post) }}', event)">
                                <img class="blog-image" src="{{ asset('images/posts/'.$post->image_path) }}" alt="Post Image">
                                <div class="blog-details">
                                    <div class="blog-topic text-tiny" onclick="goToUrl('{{ route('articles') }}', event)">
                                        {{ $post->category_id }}
                                    </div>
                                    <h3>
                                        <div class="title">
                                            {{ $post->title }}
                                        </div>
                                    </h3>
                                    {{ Str::substr($post->content, 0, 150) }}
                                    <p class="text-tiny"><time>
                                            {{ $post->date }}
                                        </time><i class="fa-solid fa-clock"></i></p>
                                </div>
                            </div>
                            @endforeach
                            <button class="btn btn-primary load-more" onclick="goToUrl('{{ route('articles') }}')">See More</button>
                    </div>


                    <div class="sidebar-container">
                    @yield('categories')

                    @yield('tags')

                    </div>



            </section>

        </div>
    </div>

    </main>
@endsection
