{{--<div class="comment" style="left: {{ 1.5 * $indent_level }}%;width: calc(100% - {{ 1.5 * $indent_level }}%)">--}}
{{--<form action="{{ route('posts.comments.store', $post) }}" method="POST">--}}
{{--    @csrf--}}
{{--    @if($errors->has('content'))--}}
{{--        <div class="error">{{ $errors->first('content') }}</div>--}}
{{--    @endif--}}
{{--    @if($comment_replied_to !== null)--}}
{{--        <input type="hidden" name="comment_id" value="{{ $comment_replied_to->id}}">--}}
{{--    @endif--}}
{{--    <textarea class="textinput" placeholder="{{ $placeholder }}" name="content"></textarea>--}}
{{--    <div class="flex-wrapper">--}}
{{--        <button type="submit" class="btn btn-tertiary">Submit</button>--}}
{{--        --}}{{--                        Show markdown preview:--}}
{{--        --}}{{--                        <label class="switch">--}}
{{--        --}}{{--                            <input type="checkbox" checked>--}}
{{--        --}}{{--                            <span class="slider round"></span>--}}
{{--        --}}{{--                        </label>--}}

{{--    </div>--}}
{{--</form>--}}
{{--</div>--}}
