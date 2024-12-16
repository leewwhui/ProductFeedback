<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Attributes\On;
use Livewire\Component;

class Comments extends Component
{
    public $comments;
    public $feedback_id;

    public function mount($feedback_id, $comments)
    {
        $this->comments = $comments;
        $this->feedback_id = $feedback_id;
    }

    #[On('comment-created')]
    public function loadComments()
    {
        $this->comments = Comment::where('feedback_id', $this->feedback_id)->with('user')->get();
    }

    public function render()
    {
        return view('livewire.comment.comments');
    }
}
