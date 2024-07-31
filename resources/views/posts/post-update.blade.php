

{{--<link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.1/ckeditor5.css">--}}
{{--<link rel="stylesheet" href="{{asset('/assets/vendor/style.css')}}">--}}
@if(session()->has('success'))
    <div class="message success">
        {{ session()->get('success') }}
    </div>
@elseif(session()->has('error'))
    <div class="message error">
        {{ session()->get('error') }}
    </div>
@endif
<form action="{{route('post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-wrapper">
        <label for="title">Title:</label>
        <input type="text" id="title" value="{{$post->title}}" name="title" required>
        <label for="subtitle">Subtitle:</label>
        <input type="text" id="subtitle" value="{{$post->subtitle}}" name="subtitle" required>
        <label for="imageUpload">Post Image:</label>
        <input type="file" id="imageUpload" name="postImage" accept="image/*" multiple>



        <label for="category">Category:</label>
        <select id="category" name="category_id" required>
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

        <textarea name="content" id="editor">{{$post->content}}</textarea>
        <button type="submit" class="btn btn-primary">Submit</button>

    </div>
</form>
<script type="module" src="{{ asset('assets/vendor/ckeditor5.js') }}"></script>
<script type="module" src="{{ asset('/js/tabcontroller.js') }}"></script>
