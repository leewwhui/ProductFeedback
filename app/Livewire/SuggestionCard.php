<?php

namespace App\Livewire;

use App\Models\Feedback;
use Livewire\Component;

class SuggestionCard extends Component
{
    public Feedback $feedback;

    public bool $isInteractive = true;

    public function mount(Feedback $feedback)
    {
        $this->feedback = $feedback;
    }

    public function navigateToFeedback(int $id)
    {
        if (!$this->isInteractive) return;
        return redirect()->route('feedback.show', $id);
    }

    public function render()
    {
        return view('livewire.suggestion-card');
    }
}
