<?php

namespace App\Livewire;

use App\Enums\Categories;
use App\Enums\Status;
use App\Models\Feedback;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditFeedbackForm extends Component
{
    public $categories;
    public $statusList;

    public Feedback $feedback;

    #[Validate('required|min:7')]
    public string $title = '';

    #[Validate('required|min:10')]
    public string $description = '';

    #[Validate('required')]
    public string $category;

    #[Validate('required')]
    public string $status;

    public function __construct()
    {
        $this->categories = [
            Categories::FEATURE->value => Categories::FEATURE->real(),
            Categories::UI->value => Categories::UI->real(),
            Categories::UX->value => Categories::UX->real(),
            Categories::ENHANCEMENT->value => Categories::ENHANCEMENT->real(),
            Categories::BUG->value => Categories::BUG->real(),
        ];

        $this->statusList = [
            Status::SUGGESTION->value => Status::SUGGESTION->real(),
            Status::PLANNED->value => Status::PLANNED->real(),
            Status::IN_PROGRESS->value => Status::IN_PROGRESS->real(),
            Status::LIVE->value => Status::LIVE->real(),
        ];
    }

    public function mount(Feedback $feedback)
    {
        $this->feedback = $feedback;
        $this->title = $feedback->title;
        $this->status = $feedback->status;
        $this->category = $feedback->category;
        $this->description = $feedback->description;
    }

    public function save()
    {
        $this->validate();

        Feedback::where('id', $this->feedback->id)->update([
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'category' => $this->category,
        ]);

        return redirect()->route('feedback.show', ['feedback' => $this->feedback]);
    }

    public function delete()
    {
        Feedback::where('id', $this->feedback->id)->delete();
        return redirect()->route('feedback.index');
    }

    public function render()
    {
        return view('livewire.edit-feedback-form');
    }
}
