<?php

namespace App\Livewire;

use App\Enums\Categories;
use App\Models\Feedback;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateFeedbackForm extends Component
{
    public $categories;

    #[Validate('required')]
    public $category = Categories::FEATURE->value;

    #[Validate('required|min:7')]
    public $title = '';

    #[Validate('required|min:10')]
    public $description = '';

    public function __construct()
    {
        $this->categories = [
            Categories::FEATURE->value => Categories::FEATURE->real(),
            Categories::UI->value => Categories::UI->real(),
            Categories::UX->value => Categories::UX->real(),
            Categories::ENHANCEMENT->value => Categories::ENHANCEMENT->real(),
            Categories::BUG->value => Categories::BUG->real(),
        ];
    }

    public function save()
    {
        $this->validate();

        $feedback = Feedback::create([
            'upvotes' => 0,
            'title' => $this->title,
            'status' => "suggestion",
            'category' => $this->category,
            'description' => $this->description,
        ]);

        return redirect()->route('feedback.show', ['feedback' => $feedback]);
    }

    public function render()
    {
        return view('livewire.create-feedback-form');
    }
}
