@extends('layouts.template')

@section('content')
    <div class="main">
        <div class="container">
            <div class="article-container">
                <div class="article-header">
                    <div class="text-sm"><b>Published</b> {{ $post->updated_at }} <i class="fa-solid fa-clock"></i>
                    </div>
                    <h2>{{ $post->title }}</h2>
                    <h4>
                        <div class="text-grayed-out">{{ $post->subtitle }}</div>
                    </h4>
                </div>
                <div class="article-midsection">
                    <hr class="solid">
                    By <b>{{ $post->user->name }}</b>
                    <button id="copy-url-btn" class="btn btn-tertiary"><i class="fa-regular fa-copy"></i>&nbsp;Copy Link
                    </button>
                    <hr class="solid">
                    <p>{!! $post->html !!}</p>
                </div>
            </div>
            <section class="comment-section" id="comments">
                <h1>Discussion ({{$comment_count}})</h1>
                <p>Write a comment:</p>
                <form action="" method="POST">
                    <textarea class="textinput" placeholder="Your comment"></textarea>
                    <div class="flex-wrapper">
                    <button type="submit" class="btn btn-tertiary">Submit</button>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label>
                    </div>
                </form>
                <h1>Comment Section</h1>
                @foreach($comments as $comment)
                    <div class="comment">
                        <ul>
                            <p>{{ $comment->content }}</p>
                            <div class="text-sm text-grayed-out">
                                {{ $comment->created_at->diffForHumans() }} by {{ $comment->user->name }}
                            </div>
                        </ul>
                    </div>
                    @if($comment->replies->count() > 0)
                        @include('posts.post-show-child-comment-list',['comments'=>$comment->replies, 'indent_level'=> 1])
                    @endif
                @endforeach
                {{--                @include('posts.posts-show-comments',['comments'=>$comments])--}}
            </section>
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const copyUrlBtn = document.getElementById('copy-url-btn');

            copyUrlBtn.addEventListener('click', async function () {
                try {
                    const currentUrl = window.location.href;
                    await navigator.clipboard.writeText(currentUrl);
                } catch (err) {
                    console.error('Failed to copy URL: ', err);
                }
            });
        });
    </script>
@endsection


