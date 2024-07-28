<div>
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
                <button wire:click="add_like" class="btn btn-quarternary"><i class="fa-regular fa-thumbs-up"></i>{{$current_likes}}</button>

                <button wire:click="toggle_visibility" class="btn btn-quarternary"><i class="fa fa-reply"
                                                                                                  aria-hidden="true"> Reply</i>
                </button>
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
        <p>{{ $comment->content }}</p>
    </ul>
</div>

    @if($show_replyarea)
    <livewire:commentarea :post="$post" :comment="$comment" :indent="$indent_level" />
    @endif
</div>

