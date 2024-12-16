<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateCommentsForm extends Component
{
    public int $feedback_id;

    #[Validate('required|min:10|max:250')]
    public $content = '';

    public function mount($feedback_id)
    {
        $this->feedback_id = $feedback_id;
    }

    public function save()
    {
        $this->validate();

        Comment::create([
            'content' => $this->content,
            'feedback_id' => $this->feedback_id,
            'parent_id' => null,
            'reply_id' => null,
            'user_id' => 1,
        ]);

        $this->dispatch('comment-created');
    }

    public function render()
    {
        return view('livewire.comment.create-comment-form');
    }
}
