{{--<script src="{{ asset('/js/tabcontroller.js') }}"></script>--}}
<h2>Posts</h2>
@if(session()->has('success'))
    <div class="message success">
        {{ session()->get('success') }}
    </div>
@elseif(session()->has('error'))
    <div class="message error">
        {{ session()->get('error') }}
    </div>
@endif
@can('create', \App\Models\Post::class)
    <form action="{{route('post.create')}}"  method="GET">
<button class="btn btn-tertiary" data-url="{{route('post.create')}}" id="create_post_btn"><i class="fa-solid fa-plus"></i>Create Post</button>
    </form>
@endcan
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
{{--                <form action="{{route('post.edit', $post->id)}}" method="GET">--}}
                    @csrf
                <button class="btn btn-tertiary" data-url="{{route('post.edit', $post->id)}}" id="edit_post_btn"><i class="fa-solid fa-pen-to-square"></i>Edit</button>
{{--                </form>--}}
                <form action="{{route('post.destroy', $post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                <button class="btn btn-tertiary"><i class="fa-solid fa-trash-can"></i>Delete</button>
                </form>
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
                <td>{{ strip_tags($comment->content) }}</td>
{{--                {{dd($comment, $comment->post)}}--}}
                <td><a href="{{route('post.show', $comment->post_id)}}">{{$comment->post->title}}</a></td>
                <td>{{$comment->likes->count()}}</td>
                <td>{{$comment->created_at}}</td>
                <td>
                    <form action="{{route('comment.edit', $comment->id)}}" method="GET">
                        @csrf
                        <button class="btn btn-tertiary" data-url="{{route('comment.edit', $comment->id)}}" id="edit_cmt_btn"><i class="fa-solid fa-pen-to-square"></i>Edit</button>
                    </form>
                    <form action="{{route('comment.destroy', $comment->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-tertiary"><i class="fa-solid fa-trash-can"></i>Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>


<h2>Liked Comments</h2>
<div class="table-wrapper">
    <table class="table">
        <thead>
        <tr>
            <th>Comment</th>
            <th>Author</th>
            <th>Post</th>
        </tr>
        </thead>
        @foreach($user->likes as $like)
            <tr>
                <td>{{strip_tags($like->content)}}</td>
                <td>{{$like->user->name}}</td>
                <td><a href="{{route('post.show', $like->post_id)}}">{{$like->post->title}}</a></td>
            </tr>
        @endforeach
    </table>
</div>

