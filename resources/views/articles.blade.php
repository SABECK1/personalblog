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
                    <section name="categories" class="table-wrapper">
                        <table class="table">
                            <h2 class="h2">Categories</h2>
                            <thead>
                                <tr>
                                    <th class="table-count">Posts</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class='table-count'>{{ $category->category_count }}</td>
                                        <td>{{ $category->category_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                    <section name="tags" class="table-wrapper">
                        <table class="table">
                            <h2 class="h2">Tags</h2>
                            <thead>
                                <tr>
                                    <th class="table-count">Posts</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td class='table-count'>{{ $tag->tag_count }}</td>
                                        <td>{{ $tag->tag_name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </section>
        </div>
    </div>
    </main>
@endsection
