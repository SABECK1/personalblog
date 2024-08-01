<form action="{{ route('posts.comments.store', $post) }}" method="POST">
<div class="comment" id="@if($comment !== null){{$comment->id}}@endif" style="left: {{ 1.5 * $indent_level }}%;display: @if($comment !== null) none @endif;width: calc(100% - {{ 1.5 * $indent_level }}%)">
{{--    {{dd($post,$comment_replied_to}}--}}

        @csrf
        @if($errors->has('content'))
            <div class="error">{{ $errors->first('content') }}</div>
        @endif
        @if($comment !== null)
            <input type="hidden" name="comment" value="{{ $comment->id }}">
        @endif
        <textarea class="editor textinput" placeholder="{{ $placeholder }}" name="content" id="editor @if($comment !== null) {{$comment->id}} @endif"></textarea>
        <div class="flex-wrapper">
            <button type="submit" class="btn btn-tertiary">Submit</button>
        </div>

</div>
</form>


