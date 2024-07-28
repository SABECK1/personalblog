<div class="comment" style="left: {{ 1.5 * $indent_level }}%;width: calc(100% - {{ 1.5 * $indent_level }}%)">
{{--    {{dd($post,$comment_replied_to}}--}}
    <form action="{{ route('posts.comments.store', $post) }}" method="POST">
        @csrf
        @if($errors->has('content'))
            <div class="error">{{ $errors->first('content') }}</div>
        @endif
        @if($comment !== null)
            <input type="hidden" name="comment" value="{{ $comment->id }}">
        @endif
        <textarea class="textinput" placeholder="{{ $placeholder }}" name="content"></textarea>
        <div class="flex-wrapper">
            <button type="submit" class="btn btn-tertiary">Submit</button>
        </div>
    </form>
</div>
