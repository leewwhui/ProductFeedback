<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CommentCard extends Component
{
    public $comment;
    public $reply;

    #[Validate("required|min:10|max:250")]
    public $content = '';

    public function mount($comment, $reply = null)
    {
        $this->comment = $comment;
        $this->reply = $reply;
    }

    public function save()
    {
        $this->validate();

        Comment::create([
            'content' => $this->content,
            'feedback_id' => $this->comment->feedback_id,
            'parent_id' => $this->comment->parent_id ?? $this->comment->id,
            'reply_id' => $this->comment->id,
            'user_id' => 1,
        ]);

        $this->dispatch('comment-created');
    }

    public function render()
    {
        return view('livewire.comment.comment-card');
    }
}
