@extends('layouts.template')
@section('content')
    <div class="main">
        <div class="blog">

            <section class="filter-bar">
{{--                <label>Sort By Date</label>--}}

            </section>

            <h2 class="h1">All Blog Posts</h2>

            <section class="container">
                <div class="blog-card-group">
                    @foreach ($posts as $post)
                        <div class="blog-card" onclick="goToUrl('{{ route('post.show', $post) }}', event)">
                            <img class="blog-image" src="{{ asset('images/posts/' . $post->image_path) }}" alt="Post Image">
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
                                    </time></p>
                            </div>
                        </div>
                    @endforeach
                    <div class="paginate-links">{{ $posts->links('vendor.pagination.custom_pagination') }}</div>
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
