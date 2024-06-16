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
                @auth
                    <p>Write a comment:</p>
                    <livewire:commentarea :post="$post" :comment="null" :indent="0" />
                @endauth
                <h1>Comment Section</h1>
                @foreach($comments as $comment)

                    <livewire:comment :post="$post" :comment="$comment" :indent="0"/>
                    @if($comment->replies->count() > 0)
                        @include('posts.post-show-child-comment-list',['comments'=>$comment->replies, 'indent_level'=> 1])
                    @endif
                @endforeach
                <div
                    class="paginate-links">{{ $comments->fragment('comments')->links('vendor.pagination.custom_pagination') }}</div>
            </section>
        </div>
    </div>
    <script>
        function toggleElement() {
            const paragraph = document
                .getElementById('myparagraph');
            const currentVisibility = window
                .getComputedStyle(paragraph).visibility;

            if (currentVisibility === 'hidden') {
                paragraph.style.visibility = 'visible';
            } else {
                paragraph.style.visibility = 'hidden';
            }
        }
    </script>
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


