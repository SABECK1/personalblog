<form action="{{route('post.store')}}" method="POST">
        <div class="form-wrapper">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="">Select a category</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach


                <!-- Add more categories as needed -->
            </select>

            <fieldset>
                <legend>Tags:</legend>
                {{--        <input type="checkbox" id="tag1" name="tags[]" value="tag1">--}}
                {{--        <label for="tag1">Tag 1</label><br>--}}
                {{--        <input type="checkbox" id="tag2" name="tags[]" value="tag2">--}}
                {{--        <label for="tag2">Tag 2</label><br>--}}

                @foreach($tags as $tag)
                    <input type="checkbox" id="tag{{$tag->id}}" name="tags[]" value="{{$tag->id}}">
                    <label for="tag{{$tag->id}}">{{$tag->tag_name}}</label><br>
                @endforeach
                <!-- Add more tags as needed -->
            </fieldset>

            <label for="imageUpload">Post Image:</label>
            <input type="file" id="imageUpload" name="imageUpload" accept="image/*" multiple>

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
</form>
