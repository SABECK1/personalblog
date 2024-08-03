<div>
    <script type="module">
        document.addEventListener('DOMContentLoaded', () => {
            // Dynamically import setForm when the DOM is fully loaded
            import('{{asset('/js/commenteditor.js')}}').then(({setForm}) => {

                const commentId = {{$comment->id}};
                const postUrl = "{{ route('posts.comments.store', $post) }}";
                const editUrl = "{{ route('posts.comments.update', ['post' => $post, 'comment' => $comment]) }}";
                // Find the button and attach an event listener
                const replyButton = document.getElementById('reply{{$comment->id}}');
                if (replyButton !== null) {
                    replyButton.addEventListener('click', () => {
                        setForm(commentId, postUrl, 'Reply');
                    });
                }

                const editButton = document.getElementById('edit{{$comment->id}}');
                if (editButton !== null) {
                    editButton.addEventListener('click', () => {
                        setForm(commentId, editUrl, 'Edit');
                    })
                }
            });
        });
    </script>

<div class="comment" style="left: {{ 1.5 * $indent_level }}%;width: calc(100% - {{ 1.5 * $indent_level }}%)">
    <ul>
        <div class="comment-header">
            <div class="text-sm text-grayed-out">
                @if ($post->user == $comment->user)
                    <div class="text-wrapper-sm">AUTHOR</div>
                @endif

                @if ($comment->user->role->role_name != \App\Models\Role::ROLE_STANDARD )
                    <div class="text-wrapper-sm">{{ strtoupper($comment->user->role->role_name) }}</div>
                @endif

                {{ $comment->user->name }}  {{ $comment->created_at->diffForHumans() }}
            </div>
            <div class="btn-group">

                <button wire:click="add_like" class="btn btn-quarternary">@if($user && $user->hasLikedComment($comment)) <i class="fa-solid fa-thumbs-up"></i> @else <i class="fa-regular fa-thumbs-up"></i> @endif{{$current_likes}}</button>

                <button id="reply{{$comment->id}}" class="btn btn-quarternary"><i class="fa fa-reply" aria-hidden="true"> Reply</i> </button>

                @can('update', $comment)
                    <button id="edit{{$comment->id}}" class="btn btn-quarternary"><i class="fa-solid fa-pen-to-square"> Edit</i></button>
                @endcan

                <form
                    action="{{ route('posts.comments.destroy', ['post' => $post, 'comment' => $comment]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')

                    @can('delete', $comment)
                        <button class="btn btn-quarternary btn-warning"><i class="fa fa-trash-o"
                                                                           aria-hidden="true"></i>
                        </button>
                    @endcan
                </form>
            </div>
        </div>
        <hr class="solid">
        <p>{!! $comment->html !!}</p>
    </ul>
</div>

{{--    @if($show_replyarea)--}}
    <livewire:commentarea :post="$post" :comment="$comment" :indent="$indent_level" />
{{--    @endif--}}



</div>

