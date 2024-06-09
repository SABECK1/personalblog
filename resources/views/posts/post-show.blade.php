@extends('layouts.template')
{{-- {{ dd($post) }} --}}

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
                <h1>Comment Section</h1>
{{--                {{dd($comments)}}--}}
                @foreach($comments as $comment)
                    <div class="comment">
                        <ul>
                            <p>{{ $comment->content }}</p>
                            <div class="text-sm text-grayed-out">
                                {{ $comment->created_at->diffForHumans() }} by {{ $comment->user->name }}
                            </div>
                        </ul>
                    </div>
                    @foreach($comment->replies as $reply)
                    <div class="comment-indented">
                        <ul>
                            <p>{{ $reply->content }}</p>
                            <div class="text-sm text-grayed-out">
                                {{ $reply->created_at->diffForHumans() }} by {{ $reply->user->name }}
                            </div>
                        </ul>
                    </div>
                    @endforeach
                @endforeach
                <div class="paginate-links">{{ $comments->fragment('comments')->links('vendor.pagination.custom_pagination') }}</div>
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


