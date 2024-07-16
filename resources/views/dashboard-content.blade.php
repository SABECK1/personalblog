
<table class="table">
    <thead>
    <tr>
        <th>Title</th>
        <th>Category</th>
        <th>Tags</th>
        <th>Actions</th>
    </tr>
    </thead>
    @foreach($posts as $post )
        <tr>
            <td>{{$post->title}}</td>
            <td>{{$post->category->category_name}}</td>
            <td>@foreach($post->tags as $tag){{$tag->tag_name}} @endforeach</td>
        </tr>
    @endforeach
</table>
