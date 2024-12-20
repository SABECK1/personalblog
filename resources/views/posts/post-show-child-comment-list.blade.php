@if(count((array)$comments))
    @foreach($comments as $reply)
        <livewire:comment :post="$post" :comment="$reply" :indent="$indent_level"/>
        @if($reply->replies->count()>0)
            @include('posts.post-show-child-comment-list',['comments'=>$reply->replies, 'indent_level'=>$indent_level + 1])
        @endif
    @endforeach
@endif

