@extends('layouts.template')
@section('content')
    <div class="main">
        <div class="blog">

            <section class="filter-bar">
                                <label>Sort By Date</label>
                <div class="dropdown">
                    <button onclick="showDropdown()" class="btn btn-primary"></button>
                    <div id="sortdropdown" class="dropdown-content">
{{--                        <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">--}}
                        <a href="#">About</a>
                        <a href="#">Base</a>
                        <a href="#">Blog</a>
                        <a href="#">Contact</a>
                        <a href="#">Custom</a>
                        <a href="#">Support</a>
                        <a href="#">Tools</a>
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
                                <div class="blog-topic text-tiny" onclick="goToUrl('{{ route('articles') }}', event)">
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
                                        {{ $post->date }}
                                    </time>
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
        function showDropdown() {
            document.getElementById("sortdropdown").classList.toggle("show");
        }

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
