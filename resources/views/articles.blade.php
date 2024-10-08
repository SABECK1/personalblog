@extends('layouts.template')
@section('content')
    <script src="{{ asset('/js/filterbar.js') }}" defer></script>
    <div class="main">
        <div class="blog">

            <section class="filter-bar">
                <h2>Apply Filters/Sort</h2>
                <div class="dropdown">
                    <button onclick="showDropdown('sortdropdown')" class="btn btn-primary"><i class="fa fa-sort"
                                                                                              aria-hidden="true"></i>
                        Sort By
                    </button>
                    <div id="sortdropdown" class="dropdown-content">
                        {{--                        <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">--}}
                        <a href="{{url()->query('/posts?'.request()->getQueryString(), ['sort' => '-created_at'])}}">Latest</a>
                        <a href="{{url()->query('/posts?'.request()->getQueryString(), ['sort' => 'created_at'])}}">Oldest</a>
                        <a href="{{url()->query('/posts?'.request()->getQueryString(), ['sort' => 'title'])}}"><i
                                class="fa fa-sort-alpha-asc"
                                aria-hidden="true"></i> A-Z</a>
                        <a href="{{url()->query('/posts?'.request()->getQueryString(), ['sort' => '-title'])}}"><i
                                class="fa fa-sort-alpha-desc"
                                aria-hidden="true"></i> Z-A</a>
                    </div>

                    <button onclick="showDropdown('filterdropdowncategories')" class="btn btn-primary"><i
                            class="fa fa-sort" aria-hidden="true"></i> Filter By Category
                    </button>
                    <div id="filterdropdowncategories" class="dropdown-content">
                        <input type="text" class="textinput" placeholder="Search.." id="filtercategories"
                               onkeyup="filter('filtercategories', 'filterdropdowncategories')">
                        @foreach($categories as $category)
                            <a href="{{url()->query('/posts?'.request()->getQueryString(), ['filter[categories.category_name]' => $category->category_name])}}">{{$category->category_name }}</a>
                        @endforeach
                    </div>

                    <button onclick="showDropdown('filterdropdowntags')" class="btn btn-primary"><i class="fa fa-sort"
                                                                                                    aria-hidden="true"></i>
                        Filter By Tag
                    </button>
                    <div id="filterdropdowntags" class="dropdown-content">
                        <input type="text" class="textinput" placeholder="Search.." id="filtertags"
                               onkeyup="filter('filtertags', 'filterdropdowntags')">
                        @foreach($tags as $tag)
                            <a href="{{url()->query('/posts?'.request()->getQueryString(), ['filter[tags.tag_name]' => $tag->tag_name])}}">{{$tag->tag_name }}</a>
                        @endforeach
                    </div>

                    @if(str_contains(url()->full(), '?'))
                        <form action="{{route('posts')}}" method="GET">
                            <button class="btn btn-quarternary btn-warning"><i class="fa-solid fa-filter"></i>
                            </button>
                        </form>
                    @endif
                </div>

                    <form action="{{route('posts')}}" method="GET">
                        <div class="flex-wrapper">
                    <textarea class="textinput" name="search" placeholder="Search..." style="height: 2.5rem; overflow: hidden; width: 92%;"></textarea>
                    <button type="submit" class="btn btn-quarternary"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </form>

            </section>

            <h2 class="h1">All Blog Posts</h2>
            <section class="container">
                <div class="blog-card-group">
                    @foreach ($posts as $post)
                            <x-blog_card :post="$post"/>
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
