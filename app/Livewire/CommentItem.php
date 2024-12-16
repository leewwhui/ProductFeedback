<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CommentItem extends Component
{
    public $comment;
    public $comments;
    public $replies;

    public function mount($comment, $comments)
    {
        $this->comment = $comment;
        $this->replies = $comments->filter(fn($c) => $c->parent_id === $comment->id);
    }

    public function render()
    {
        return view('livewire.comment.comment-item');
    }
}
