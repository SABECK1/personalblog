
<link rel="stylesheet" href="{{asset('/js/tabcontroller.js')}}">
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.css">
<link rel="stylesheet" href="{{asset('/assets/vendor/style.css')}}">
{{--{{dd($category)}}--}}
<form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-wrapper">
        <label for="title">Title:</label>
        <input type="text" id="title" value="{{$post->title}}" name="postTitle" required>
        <label for="subtitle">Subtitle:</label>
        <input type="text" id="subtitle" value="{{$post->subtitle}}" name="postSubTitle" required>
        <label for="imageUpload">Post Image:</label>
        <input type="file" id="imageUpload" name="postImage" accept="image/*" multiple>



        <label for="category">Category:</label>
        <select id="category" name="postCategory" required>
            <option value="">Select a category</option>
            @foreach($all_categories as $category_option)
                <option value="{{$category_option->id}}"
                    @selected($category_option->id == $post->category->id)>
                    {{$category_option->category_name}}
                </option>
            @endforeach
        </select>

        <fieldset>
            <legend>Tags:</legend>
            @foreach($all_tags as $tag_option)

                <input type="checkbox" id="postTag{{$tag_option->id}}" name="tags[]" value="{{$tag_option->id}}"
                    @foreach($post->tags as $post_tag) @if($post_tag->id == $tag_option->id) checked @endif @endforeach>
                <label for="tag{{$tag_option->id}}">{{$tag_option->tag_name}}</label><br>
            @endforeach
        </fieldset>
        {{--            <textarea class="textinput" name="postBody"></textarea>--}}
        {{--            <div id="editor"></div>--}}
        <textarea name="editor" id="editor">{{$post->content}}</textarea>
        <button type="submit" class="btn btn-primary">Submit</button>

    </div>
</form>
<script type="module" src="{{ URL::asset('assets/vendor/ckeditor5.js') }}"></script>
<script>
    $(document).ready(function(){
        let CKEDITOR=[]

        ClassicEditor.create(document.querySelector('#one')).then(editor => {
            CKEDITOR["one"] = editor;
        })

        ClassicEditor.create(document.querySelector('#two')).then(editor => {
            CKEDITOR["two"] = editor;
        })

        $("form").on('submit',function(e){
            e.preventDefault();

            CKEDITOR["one"].destroy();
            CKEDITOR["two"].destroy();

            //Ajax Call or rest of submission goes here
        });
    })
</script>

