<?php
//
//namespace App\Http\Livewire;
//
//use Livewire\Component;
//
//class CommentBox extends Component
//{
//    public $comment_replied_to;
//    public $post;
//    public $placeholder;
//    public $indent_level;
//    public $show = false;
//    /**
//     * Create a new component instance.
//     */
//    public function __construct($post, $comment = null, $indent)
//    {
//        $this->post = $post;
//        $this->comment_replied_to = $comment;
//        $this->indent_level = $indent;
//
//        if ($comment !== null) {
//            $this->placeholder = 'Reply to: '.$comment->user->name;
//        }
//        else {
//            $this->placeholder = 'Your Comment';
//        }
//
//    }
//
//    /**
//     * Get the view / contents that represent the component.
//     */
//    public function render(): View|Closure|string
//    {
//        return view('components.comment-box');
//    }
//}
