
<link rel="stylesheet" href="{{asset('/js/tabcontroller.js')}}">
<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.css">
<link rel="stylesheet" href="{{asset('/assets/vendor/style.css')}}">
<form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-wrapper">
            <label for="title">Title:</label>
            <input type="text" id="title" name="postTitle" required>
            <label for="subtitle">Title:</label>
            <input type="text" id="subtitle" name="postSubTitle" required>
            <label for="imageUpload">Post Image:</label>
            <input type="file" id="imageUpload" name="postImage" accept="image/*" multiple>



            <label for="category">Category:</label>
            <select id="category" name="postCategory" required>
                <option value="">Select a category</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
            </select>

            <fieldset>
                <legend>Tags:</legend>
                @foreach($tags as $tag)
                    <input type="checkbox" id="postTag{{$tag->id}}" name="tags[]" value="{{$tag->id}}">
                    <label for="tag{{$tag->id}}">{{$tag->tag_name}}</label><br>
                @endforeach
            </fieldset>
{{--            <textarea class="textinput" name="postBody"></textarea>--}}
{{--            <div id="editor"></div>--}}
            <textarea name="editor" id="editor"></textarea>
            <button type="submit" class="btn btn-primary">Submit</button>

        </div>
</form>
<script type="module" src="{{ URL::asset('assets/vendor/ckeditor5.js') }}"></script>

