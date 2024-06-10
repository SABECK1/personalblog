@if(count((array)$comments))
    @foreach($comments as $reply)
        <div class="comment-indented" style="left: {{ 1.5 * $indent_level }}%;width: calc(100% - {{ 1.5 * $indent_level }}%)">
                <p>{{ $reply->content }}</p>
                <div class="text-sm text-grayed-out">
                    {{ $reply->created_at->diffForHumans() }} by {{ $reply->user->name }}
                </div>
        </div>
        @if($reply->replies->count()>0)
            @include('posts.post-show-child-comment-list',['comments'=>$reply->replies, 'indent_level'=>$indent_level + 1])
        @endif
    @endforeach
@endif

