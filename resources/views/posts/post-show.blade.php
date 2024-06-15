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
                    <form action="{{ route('posts.comments.store', $post) }}" method="POST">
                        @csrf
                        @if($errors->has('content'))
                            <div class="error">{{ $errors->first('content') }}</div>
                        @endif
                        <textarea class="textinput" placeholder="Your comment" name="content"></textarea>
                        <div class="flex-wrapper">
                            <button type="submit" class="btn btn-tertiary">Submit</button>
                            {{--                        Show markdown preview:--}}
                            {{--                        <label class="switch">--}}
                            {{--                            <input type="checkbox" checked>--}}
                            {{--                            <span class="slider round"></span>--}}
                            {{--                        </label>--}}

                        </div>
                    </form>
                @endauth
                <h1>Comment Section</h1>
                @foreach($comments as $comment)
                    <div class="comment">
                        <ul>
                            <div class="comment-header">
                                <div class="text-sm text-grayed-out">
                                    @if ($post->user == $comment->user)
                                        <div class="role">AUTHOR</div>
                                    @endif

                                    @if ($comment->user->role->id != 1 )
                                        <div class="role">{{ strtoupper($comment->user->role->role_name) }}</div>
                                    @endif

                                    {{ $comment->user->name }}  {{ $comment->created_at->diffForHumans() }}
                                </div>
                                <div class="btn-group">
                                    <form
                                        action="{{ route('posts.comments.destroy', ['post' => $post, 'comment' => $comment]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-quarternary"><i class="fa fa-reply"
                                                                               aria-hidden="true"> Reply</i>
                                        </button>
                                        <button class="btn btn-quarternary btn-warning"><i class="fa fa-trash-o"
                                                                                           aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <hr class="solid">
                            <p>{{ $comment->content }}</p>
                        </ul>
                    </div>
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


