@extends('layouts.template')
@section('content')
    <script src="{{ asset('/js/filterbar.js') }}" defer></script>
    <div class="main">
        <div class="blog">

            <section class="filter-bar">

                <div class="dropdown">
                    <button onclick="showDropdown('sortdropdown')" class="btn btn-primary"><i class="fa fa-sort" aria-hidden="true"></i> Sort By</button>
                    <div id="sortdropdown" class="dropdown-content">
{{--                        <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">--}}
                        <a href="?sort=-created_at">Latest</a>
                        <a href="?sort=created_at">Oldest</a>
                        <a href="?sort=title"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i> A-Z</a>
                        <a href="?sort=-title"><i class="fa fa-sort-alpha-desc" aria-hidden="true"></i> Z-A</a>
                    </div>

                    <button onclick="showDropdown('filterdropdowncategories')" class="btn btn-primary"><i class="fa fa-sort" aria-hidden="true"></i> Filter By Category</button>
                    <div id="filterdropdowncategories" class="dropdown-content">
                        {{--                        <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">--}}
                        @foreach($categories as $category)
                        <a href="#">{{$category->category_name}}</a>
                        @endforeach
                    </div>

                    <button onclick="showDropdown('filterdropdowntags')" class="btn btn-primary"><i class="fa fa-sort" aria-hidden="true"></i> Filter By Tag</button>
                    <div id="filterdropdowntags" class="dropdown-content">
                        {{--                        <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">--}}
                        @foreach($tags as $tag)
                        <a href="#">Latest</a>
                        @endforeach
                    </div>
                </div>
            </section>

            <h2 class="h1">All Blog Posts</h2>

            <section class="container">
                <div class="blog-card-group">
                    @foreach ($posts as $post)
                        <div class="blog-card" onclick="goToUrl('{{ route('post.show', $post) }}', event)">
                            <img class="blog-image" src="{{ asset('images/posts/' . $post->image_path) }}"
                                 alt="Post Image">
                            <div class="blog-details">
                                <div class="blog-topic text-tiny" onclick="goToUrl('{{ route('posts') }}', event)">
                                    {{ $post->category_id }}
                                </div>
                                <h3>
                                    <div class="title">
                                        {{ $post->title }}
                                    </div>
                                </h3>
                                {{ Str::substr($post->content, 0, 150) }}
                                <p class="text-tiny">
                                    <time>
                                        {{ $post->created_at }}
                                    </time> <i class="fa-solid fa-clock"></i>
                                </p>
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

    <script>
        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */


        // function filterFunction() {
        //     const input = document.getElementById("dropdownSearch");
        //     const filter = input.value.toUpperCase();
        //     const div = document.getElementById("sortdropdown");
        //     const a = div.getElementsByTagName("a");
        //     for (let i = 0; i < a.length; i++) {
        //         txtValue = a[i].textContent || a[i].innerText;
        //         if (txtValue.toUpperCase().indexOf(filter) > -1) {
        //             a[i].style.display = "";
        //         } else {
        //             a[i].style.display = "none";
        //         }
        //     }
        // }
    </script>
@endsection
