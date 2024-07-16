<h2>Posts</h2>
<div class="table-wrapper">
<table class="table">
    <thead>
    <tr>
        <th>Title</th>
        <th>Category</th>
        <th>Tags</th>
        <th>Created</th>
        <th>Actions</th>
    </tr>
    </thead>
    @foreach($posts as $post )
        <tr>
            <td><a href="{{route('post.show', $post)}}">{{$post->title}}</a></td>
            <td>{{$post->category->category_name}}</td>
            <td>@foreach($post->tags as $tag){{$tag->tag_name}} @endforeach</td>
            <td>{{$post->created_at}}</td>
            <td>

                <button class="btn btn-tertiary btn-warning"><i class="fa-solid fa-pen-to-square"></i>Edit</button>
                <button class="btn btn-tertiary btn-warning"><i class="fa-solid fa-trash-can"></i>Delete</button>

            </td>
        </tr>
    @endforeach
</table>
</div>

<h2>Comments</h2>
<div class="table-wrapper">
    <table class="table">
        <thead>
        <tr>
            <th>Content</th>
            <th>Post</th>
            <th>Likes</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
        </thead>
        @foreach($comments as $comment )
            <tr>
                <td>{{$comment->content}}</td>
                <td><a href="{{route('post.show', $comment->post)}}">{{$comment->post->title}}</a></td>
                <td>{{$comment->likes}}</td>
                <td>{{$comment->created_at}}</td>
                <td>
                    <button class="btn btn-tertiary btn-warning"><i class="fa-solid fa-pen-to-square"></i>Edit</button>
                    <button class="btn btn-tertiary btn-warning"><i class="fa-solid fa-trash-can"></i>Delete</button>
                </td>
            </tr>
        @endforeach
    </table>
</div>
