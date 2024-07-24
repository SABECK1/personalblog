

<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.css">
<link rel="stylesheet" href="{{asset('/assets/vendor/style.css')}}">
<form action="{{route('comment.update', $comment->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-wrapper">
        <textarea name="content" id="editor">{{$comment->content}}</textarea>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
<script type="module" src="{{ asset('assets/vendor/ckeditor5.js') }}"></script>
<script type="module" src="{{ asset('/js/tabcontroller.js') }}"></script>
